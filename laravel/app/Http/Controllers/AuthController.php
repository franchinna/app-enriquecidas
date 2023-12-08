<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function adminIndex()
    {
        $users = User::all();
        $carts = Cart::with('user')->paginate(3);

        if ($users->isEmpty()) {
            return redirect()
                ->route('admin.index')
                ->with([
                    'message' => "There are no Users in this site",
                    'message-type' => 'warning',
                ]);
        }

        return view('admin.index', compact('users', 'carts'));
    }

    public function profile()
    {
        $carts = Cart::with('user')
                        ->where('user_id', auth()->id())                
                        ->paginate(3);

        return view('auth.profile', compact('carts'));
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

    public function editForm(User $user)
    {

        return view('auth.edit', compact('user'));

    }

    public function admin_edit(Request $request, User $user)
    {

        if($user->rol === 1){
            if($request->password){
                $request->merge([
                    'password' => Hash::make($request->password),
                ]);
    
                $user->update($request->only(['name', 'email', 'rol', 'password']));
            }else{
                $user->update($request->only(['name', 'email', 'rol']));
            }
    
            return redirect()
                ->back()
                ->with([
                    'message' => "The User '{$user->name}' updated successfully.",
                    'message-type' => 'success',
                ]);
        }else if ($request->id === $user->id){
            if($request->password){
                $request->merge([
                    'password' => Hash::make($request->password),
                ]);
    
                $user->update($request->only(['name', 'email', 'rol', 'password']));
            }else{
                $user->update($request->only(['name', 'email', 'rol']));
            }

            return redirect()
            ->back()
            ->with([
                'message' => "The User '{$user->name}' updated successfully.",
                'message-type' => 'success',
            ]);
        }else{
            return redirect()
            ->back()
            ->with([
                'message' => "You cant modify other users.",
                'message-type' => 'success',
            ]);
        }
    }
}
