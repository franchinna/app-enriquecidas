<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Cd;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        $cart = Cart::with('cd')->get();

        //dd($cart);

        return view('cds.cart', compact('cart'));
    }

    public function addToCart($id)
    {
        $cd = Cd::find($id);

        //preguntamos si el id del CD existe en nuestra DB_DATABASE

        if (!$cd) {

            return redirect()
                ->back()
                ->with('message', 'Cd dosent exist!')
                ->with('message_type', 'danger');
        }

        $cart = Cart::with('cd')->get();

        //Si no hay carrito, se crea uno

        if (!$cart) {

            $cart = new Cart;
            $cart->cd_id = $cd->cd_id;
            $cart->quantity = 1;

            return redirect()
                ->back()
                ->with('message', 'Cd has been added successfully!')
                ->with('message_type', 'success');
        }

        //recorremos todos los items del carrito y preguntamos si coincide con el id que tenemos.
        // de conincidir, se suma 1 a la cantidad. 

        foreach ($cart as $item) {

            if ($item->cd_id == $id) {

                $item = Cart::where('cd_id', $item->cd_id)
                    ->update(['quantity' => $item->quantity + 1]);

                return redirect()
                    ->back()
                    ->with('message', 'Cd has been added successfully!')
                    ->with('message_type', 'success');
            }
        }

        $cart = Cart::create([
            'cd_id' => $id,
            'quantity' => 1
        ]);

        return redirect()
            ->back()
            ->with('message', 'Cd has been added successfully!')
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $cart = Cart::with('cd')->get();

        foreach ($cart as $item) {
            if ($item->cd_id == $id) {

                if($item->quantity == 1){

                    $item = Cart::where('cd_id', $item->cd_id)
                            ->delete();

                    return redirect()
                        ->back()
                        ->with('message', 'Cd has been removed successfully!')
                        ->with('message_type', 'success');
                }

                $item = Cart::where('cd_id', $item->cd_id)
                    ->update(['quantity' => $item->quantity - 1]);

                return redirect()
                    ->back()
                    ->with('message', 'Cd has been removed successfully!')
                    ->with('message_type', 'success');
            }
        }
    }

    public function confirmOrder(){

        Cart::truncate();

        return redirect()
        ->back()
        ->with('message', 'We have received your order 😊')
        ->with('message_type', 'success');

    }
}
