<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CdsController extends Controller
{
    public function index(){
        return view('cds.index');
    }
}
