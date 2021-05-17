<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CdsController;

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

Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('auth.login-form');
Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');


Route::prefix('/cds')->group(function() {
    Route::get('/', [CdsController::class, 'index'])
        ->name('cds.index');
    
    Route::middleware(['auth'])->group(function() {
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
