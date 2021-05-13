<?php

namespace App\Http\Controllers;
use App\Models\Cd;

use Illuminate\Http\Request;

class CdsController extends Controller
{
    public function index(Request $request){

        $cds = Cd::with('artist', 'genres')->get();

        return view('cds.index', compact('cds'));
    }

    public function view(Cd $cd){

        return view('cds.view', compact('cd'));
    }

    public function newForm(){

        return view('cds.new');
    }

    public function create(Request $request){

        $request->validate(Cd::$rules);
        
        Cd::create($request->only(['title','description','duration','cost','release_date']));

        return redirect()
        ->route('cds.index')
        ->with('message', 'CD created successful')
        ->with('message-type', 'success');
    }

    public function editForm(Cd $cd){

        return view('cds.edit', compact('cd'));
    }

    public function edit(Request $request, Cd $cd){

        $request->validate(Cd::$rules);
        $cd->update($request->only(['title','description','duration','cost','release_date']));
        

        return redirect()
        ->route('cds.index')
        ->with('message', 'CD updated successful')
        ->with('message-type', 'success');
    }
    
    public function delete(Cd $cd){

        $cd->delete();

        return redirect()
        ->route('cds.index')
        ->with('message', 'CD deleted successful')
        ->with('message-type', 'success');
    }
}
