<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        
        $request->validate(User::$rules);
        
        $credentials = $request->only(['password', 'email']);

        if(!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.login-form')
                ->withInput()
                ->with('message', 'The credentials do not match our registry')
                ->with('message_type', 'danger');
        }

        return redirect()
            ->route('cds.index')
            ->with('message', 'Welcome!')
            ->with('message_type', 'success');

    }
    
    public function logout()
    {
        auth()->logout();

        return redirect()
            ->route('cds.index')
            ->with('message', 'See you baby 🏴‍☠️👋🏻');
    }
}
