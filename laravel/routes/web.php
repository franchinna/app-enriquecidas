<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CdsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShippingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('auth.login-form');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');

Route::prefix('/register')->group(function () {
    Route::get('/', [AuthController::class, 'registerForm'])->name('auth.register-form');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
});

Route::prefix('/cds')->group(function () {
    Route::get('/', [CdsController::class, 'index'])
        ->name('cds.index');

    Route::middleware(['auth'])->group(function () {
        Route::get('/new', [CdsController::class, 'newForm'])
            ->name('cds.new-form');

        Route::post('/new', [CdsController::class, 'create'])
            ->name('cds.create');

        Route::get('/{cd}/edit', [CdsController::class, 'editForm'])
            ->name('cds.editForm');

        Route::put('/{cd}/edit', [CdsController::class, 'edit'])
            ->name('cds.edit');

        Route::delete('/{cd}/delete', [CdsController::class, 'delete'])
            ->name('cds.delete');
    });

    Route::get('/{cd}', [CdsController::class, 'view'])
        ->name('cds.view');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/order.confirm', [CartController::class, 'confirmOrder'])
        ->name('cart.confirmOrder');

    Route::get('/admin', [AuthController::class, 'adminIndex'])
        ->name('admin.index');

    Route::get('admin/users', [AuthController::class, 'adminUserPage'])
        ->name('admin.users');
    
    Route::get('admin/carts', [AuthController::class, 'adminCartPage'])
        ->name('admin.carts');
    
    Route::get('admin/edit/{user}', [AuthController::class, 'adminEditPage'])
        ->name('admin.editForm');
    
    Route::put('admin/edit/{user}', [AuthController::class, 'adminEdit'])
        ->name('admin.edit');

    Route::get('/profile', [AuthController::class, 'profile'])
        ->name('auth.profile');

    Route::get('/{user}/edit', [AuthController::class, 'editForm'])
        ->name('users.editForm');

    Route::put('/{user}/edit', [AuthController::class, 'edit'])
        ->name('users.edit');
    
    Route::delete('/{user}/delete', [AuthController::class, 'delete'])
        ->name('users.delete');

    Route::delete('admin/delete/{user}', [AuthController::class, 'adminDelete'])
        ->name('admin.delete');
});

Route::prefix('/cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])
        ->name('cart.index');
});

Route::get('/add-to-cart/{cd_id}', [CartController::class, 'addToCart'])
    ->name('cart.addToCart');

Route::get('/remove-to-cart/{cd_id}', [CartController::class, 'delete'])
    ->name('cart.delete');
