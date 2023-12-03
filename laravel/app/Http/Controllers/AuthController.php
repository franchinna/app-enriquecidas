<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function profile()
    {
        return view('auth.profile');
    }
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {

        $request->validate(User::$rules);

        $credentials = $request->only(['password', 'email']);

        if (!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.login-form')
                ->withInput()
                ->with([
                    'message' => "The credentials do not match our registry",
                    'message-type' => 'danger',
                ]);
        }

        return redirect()
            ->route('home')
            ->with([
                'message' => "Welcome",
                'message-type' => 'success',
            ]);
    }

    public function register(Request $request)
    {

        $request->validate(User::$rules);

        $request->merge([
            'rol' => '0',
            'password' => Hash::make($request->password),
        ]);

        $user = User::create($request->only(['name', 'email', 'rol', 'password']));

        return redirect()
            ->route('auth.login')
            ->with([
                'message' => "User created successful",
                'message-type' => 'success',
            ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()
            ->route('home')
            ->with([
                'message' => 'See you baby 🏴‍☠️👋🏻',
                'message-type' => 'success',
            ]);
    }
}
