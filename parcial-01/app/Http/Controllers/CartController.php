<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cd;

class CartController extends Controller
{
    public function index(){
        
        $cart = Cart::with('cd')->get();

        return view('cart.index', compact('cart'));
    }
}
