<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artist;
use App\Models\Cd;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $cds = Cd::with('artist', 'genres')->get();
        return view('home', compact('cds'));
    }
}
