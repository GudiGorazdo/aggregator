<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware("guest")->group(function () {
    Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('home');
    Route::get('/shop/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop');
    Route::get('/404', [App\Http\Controllers\UndefinedController::class, 'index'])->name('undefined');
});

// Route::middleware("auth")->group(function () {
//     Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
//     Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login_process');
// });


