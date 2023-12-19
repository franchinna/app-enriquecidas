<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Cd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();

        $cart = Cart::where('user_id', $user_id)
            ->where('status', 'In progress')
            ->first();

        $cartItems = CartItem::with('cd')
            ->where('cart_id', optional($cart)->id)
            ->get();

        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->cd->cost * $cartItem->quantity;
        });

        if (!$cart) {
            return view('cart.index', compact('cart'));
        } else {
            return view('cart.index', compact('cart', 'cartItems', 'totalPrice'));
        }
    }

    public function addToCart($cd_id)
    {
        // Obtén el usuario actualmente autenticado o null si no hay usuario autenticado
        $userId = auth()->id();

        // Busca un carrito existente para el usuario actual con status 'In progress'
        $cart = Cart::where('user_id', $userId)
            ->where('status', 'In progress')
            ->first();

        // Si no hay un carrito en progreso, crea uno
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $userId,
                'status' => 'In progress',
            ]);
        }

        // Busca si ya hay un elemento de Cd en el carrito
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('cd_id', $cd_id)
            ->first();

        // Si ya existe, incrementa la cantidad
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            // Si no existe, crea un nuevo elemento de Cd en el carrito
            CartItem::create([
                'cart_id' => $cart->id,
                'cd_id' => $cd_id,
                'quantity' => 1, // Puedes ajustar la cantidad según tus necesidades
            ]);
        }

        // Redirige a la página del carrito
        return redirect()
            ->back()
            ->with([
                'message' => 'Item added to the cart successfully.',
                'message-type' => 'success',
            ]);
    }

    public function delete($cd_id)
    {
        // Obtén el usuario actualmente autenticado o null si no hay usuario autenticado
        $user_id = auth()->id();

        // Busca un carrito existente para el usuario actual con status 'In progress'
        $cart = Cart::where('user_id', $user_id)
            ->where('status', 'In progress')
            ->first();

        // Si no hay un carrito en progreso, redirige a la página del carrito
        if (!$cart) {
            return redirect()
                ->back()
                ->with([
                    'message' => 'The cart is empty.',
                    'message-type' => 'info',
                ]);
        } else {

            $cartsItems = CartItem::where('cart_id', $cart->id)
                ->get();

            $item = CartItem::where('cart_id', $cart->id)
                ->where('cd_id', $cd_id)
                ->first();
            if (count($cartsItems) <= 1 && $item->quantity <= 1) {

                CartItem::where('cd_id', $cd_id)
                    ->delete();

                Cart::where('user_id', $user_id)
                    ->delete();
            } else {

                if ($item->quantity <= 1) {

                    CartItem::where('cd_id', $cd_id)
                        ->delete();
                } else {
                    CartItem::where('cd_id', $cd_id)->decrement('quantity');
                }
            }

            // Redirige a la página del carrito
            return redirect()
                ->back()
                ->with([
                    'message' => 'Item removed from the cart successfully.',
                    'message-type' => 'success',
                ]);
        }
    }

    public function cartDetail($cart){

        //dd($cart);

        //$user_id = auth()->id();

        $cartItems = CartItem::with('cd')
            ->where('cart_id', $cart)
            ->get();

        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->cd->cost * $cartItem->quantity;
        });

        return view('cart.detail', compact('cart', 'cartItems', 'totalPrice'));
    }
}
