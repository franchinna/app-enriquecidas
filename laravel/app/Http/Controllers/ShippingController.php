<?php

namespace App\Http\Controllers;

use App\Models\Cd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class ShippingController extends Controller
{
    public function index(Request $request){


        $formParams = [];
        $userRol = 0;

        $cdsQuery = Cd::with('artist', 'genres');

        if($request -> query('cdtitle')){
            $cdsQuery->where('title', 'like', '%' . $request -> query('cdtitle') . '%');
            $formParams['cdtitle'] = $request -> query('cdtitle');
        }

        $cds = $cdsQuery->paginate(3)->withQueryString();

        if($cds -> isEmpty()){
            return redirect()
            ->route('cds.index')
            ->with([
                'message' => "There are no CD's with that name",
                'message-type' => 'warning',
            ]);
        }

        if(Auth::user() != null){
            $userRol = Auth::user()->rol;
        }

        return view('admin.index', compact('cds', 'formParams', 'userRol'));
    }
}
