<?php

namespace App\Http\Controllers;


use App\Models\Cd;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
        
        // Buscamos el user_id en usuarios. 
        // $user_id = Auth::user()->user_id;

        // $cart = Cart::find($user_id);

        $cds = Cd::with('artist', 'genres')->get();
        return view('home', compact('cds'));
    }
}
