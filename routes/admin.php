<?php
use Illuminate\Support\Facades\Route;

Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');

Route::middleware('auth::admin')->group(function () {
    Route::resource('shops', \App\Http\Controllers\Admin\ShopController::class);
});
