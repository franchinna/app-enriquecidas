<?php

namespace App\Http\Controllers;
use App\Models\Cd;

use Illuminate\Http\Request;

class CdsController extends Controller
{
    public function index(Request $request){

        $cds = Cd::All();

        return view('cds.index', compact('cds'));
    }

    public function view(Cd $cd){
        return view('cds.view', compact('cd'));
    }

    public function newForm(){
        return view('cds.new');
    }

    public function create(Request $request){

        //TODO validate
        
        Cd::create($request->only(['title','description','duration','cost','release_date']));

        return redirect()->route('cds.index');
    }
    
}
