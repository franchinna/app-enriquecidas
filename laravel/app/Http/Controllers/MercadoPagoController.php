<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;

class MercadoPagoController extends Controller
{
    public function comprarForm()
    {
        $user_id = auth()->id();

        $cart = Cart::where('user_id', $user_id)
            ->where('status', 'In progress')
            ->first();

        $cartItems = [];

        if ($cart) {
            $cartItems = CartItem::with('cd')
                ->where('cart_id', optional($cart)->id)
                ->get();

            $totalPrice = $cartItems->sum(function ($cartItem) {
                return $cartItem->cd->cost * $cartItem->quantity;
            });

            // Creamos los items para el cobro.
            $items = [];
            foreach ($cartItems as $cartItem) {
                $item = new Item();
                $item->title = $cartItem->cd->title;
                $item->unit_price = $cartItem->cd->cost / 100;
                $item->quantity = $cartItem->quantity;
                $items[] = $item;
            }

            // Creamos la "preferencia" (detalles de la transacción).
            $preference = new Preference();

            // Le definimos los items, que deben ser un array de objetos MercadoPago\Item.
            $preference->items = $items;

            // Configuramos las URLs de callback para los resultados de los pagos.
            $preference->back_urls = [
                'success' => route('mp.payment.confirmed'),
                'pending' => route('mp.payment.pending'),
                'failure' => route('mp.payment.failed')
            ];

            // "Guardamos" los detalles de la preferencia.
            $preference->save();


            return view('cart.index', compact('preference', 'cart', 'cartItems', 'totalPrice'));
        }
        return view('cart.index', compact('cart'));
    }

    public function paymentConfirmed(Request $request)
    {
        $user_id = auth()->id();

        $cart = Cart::where('user_id', $user_id)
            ->where('status', 'In progress')
            ->first();

        $cart->update(['status' => 'Finished']);

        // Redirige a la página del carrito
        return redirect()
            ->route('auth.profile')
            ->with([
                'message' => 'Your purchase was successful. Thank you very much for purchasing on our site.',
                'message-type' => 'success',
            ]);
    }

    public function paymentPending(Request $request)
    {
        return redirect()
            ->route('cart.index')
            ->with([
                'message' => 'Your purchase is pending approval. It will be updated shortly. If this does not happen, contact us.',
                'message-type' => 'warning',
            ]);
    }

    public function paymentFailed(Request $request)
    {
        return redirect()
            ->route('cart.index')
            ->with([
                'message' => 'Your purchase was rejected. Please try again and if it happens again, contact us.',
                'message-type' => 'danger',
            ]);
    }
}
