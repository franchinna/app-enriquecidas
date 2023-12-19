<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class AuthController extends Controller
{
    // Inicio de las funciones de las vistas
    public function adminIndex()
    {
        return view('admin.index');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }
    // Fin de las funciones de las vistas

    public function adminCartPage()
    {
        $carts = Cart::orderBy('updated_at', 'DESC')
        ->paginate(5);

        $chart_options = [
            'chart_title' => 'Shipping by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Cart',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
        ];

        $chart = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Carts status',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Cart',
            'group_by_field' => 'status',
            'chart_type' => 'pie',
        ];

        $chart2 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Users',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
        ];

        $chart3 = new LaravelChart($chart_options);

        return view('admin.carts', compact('carts', 'chart', 'chart2', 'chart3'));
    }

    public function adminUserPage()
    {
        $users = User::orderBy('updated_at', 'DESC')
        ->paginate(4);

        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
        ];

        $chart = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Users deleted',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\User',
            'group_by_field' => 'available',
            'chart_type' => 'pie',
        ];

        $chart2 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Users',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
        ];

        $chart3 = new LaravelChart($chart_options);

        if ($users->isEmpty()) {
            return redirect()
                ->route('admin.index')
                ->with([
                    'message' => "There are no Users in this site",
                    'message-type' => 'warning',
                ]);
        }

        return view('admin.users', compact('users', 'chart', 'chart2', 'chart3'));
    }

    public function profile()
    {
        $carts = Cart::with('user')
            ->where('user_id', auth()->id())
            ->orderBy('updated_at', 'DESC')
            ->paginate(4);

        return view('auth.profile', compact('carts'));
    }

    public function login(Request $request)
    {
        $request->validate(User::$rules);

        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.login')
                ->withInput($request->only('email'))
                ->with([
                    'message' => 'The credentials do not match our records.',
                    'message-type' => 'danger',
                ]);
        }

        $cart = Cart::with('user')
            ->where('user_id', NULL)->first();

        if ($cart) {
            $cart->update(['user_id' => auth()->id()]);
        }

        return redirect()
            ->route('home')
            ->with([
                'message' => 'Welcome!',
                'message-type' => 'success',
            ]);
    }

    public function register(Request $request)
    {

        $request->validate(User::$rules);

        $request->merge([
            'rol_id' => '2',
            'available' => 'Y',
            'password' => Hash::make($request->password),
        ]);

        $user = User::create($request->only(['name', 'email', 'rol_id', 'password','available']));

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

    public function delete(User $user)
    {

        auth()->logout();
        $user->available = 'N';
        $user->update($user->only(['available']));

        return redirect()
            ->route('home')
            ->with([
                'message' => "The user'{$user->name}' deleted successfully.",
                'message-type' => 'success',
            ]);
    }

    public function adminDelete(User $user)
    {
        $user->available = 'N';
        //dd($user->available);

        $user->update($user->only(['available']));

        return redirect()
            ->route('admin.users')
            ->with([
                'message' => "The user '{$user->name}' deleted successfully.",
                'message-type' => 'success',
            ]);
    }

    public function adminActivate(User $user)
    {
        $user->available = 'Y';
        //dd($user->available);

        $user->update($user->only(['available']));

        return redirect()
            ->route('admin.users')
            ->with([
                'message' => "The user '{$user->name}' activated successfully.",
                'message-type' => 'success',
            ]);
    }

    public function editForm(User $user)
    {
        if (auth()->id() === $user->id) {

            $rols = Rol::all();
            $user =  User::select('users.*', 'rols.name as rol_name')
                ->join('rols', 'users.rol_id', '=', 'rols.rol_id')
                ->where('users.id', '=', $user->id)
                ->first();

            return view('auth.edit', compact('user', 'rols'));
        } else {
            return redirect()
                ->route('auth.profile')
                ->with([
                    'message' => "You cant modify other users 🧐",
                    'message-type' => 'warning',
                ]);
        }
    }

    public function edit(Request $request, User $user)
    {

        if ($request->password) {

            $request->merge(['password' => Hash::make($request->password)]);

            $request->validate(User::$rules);

            $user->update($request->only(['name', 'email', 'rol_id', 'password']));

            auth()->logout();

            return redirect()
                ->route('home')
                ->with([
                    'message' => 'Your password was changed successfully',
                    'message-type' => 'success',
                ]);
        } else {

            $request->merge(['password' => $user->password]);

            $request->validate(User::$rules);

            $user->update($request->only(['name', 'email', 'rol_id', 'password']));

            return redirect()
                ->route('auth.profile')
                ->with([
                    'message' => "The user '{$user->name}' updated successfully.",
                    'message-type' => 'success',
                ]);
        }
    }

    public function adminEditPage(User $user)
    {

        $rols = Rol::all();
        $user =  User::select('users.*', 'rols.name as rol_name')
            ->join('rols', 'users.rol_id', '=', 'rols.rol_id')
            ->where('users.id', '=', $user->id)
            ->first();

        return view('admin.edit', compact('user', 'rols'));
    }

    public function adminEdit(Request $request, User $user)
    {

        //dd($request, $user);

        if ($request->password) {

            $request->merge([
                'password' => Hash::make($request->password),
            ]);

            $request->validate(User::$rules);

            $user->update($request->only(['name', 'email', 'rol_id', 'password']));
        } else {
            $request->merge(['password' => $user->password]);

            $request->validate(User::$rules);

            $user->update($request->only(['name', 'email', 'rol_id', 'password']));
        }

        return redirect()
            ->route('admin.index')
            ->with([
                'message' => "The user '{$user->name}' updated successfully.",
                'message-type' => 'success',
            ]);
    }
}
