<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest.admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('home');
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
    // Route::any('{all}', function () {
    //     if (!Auth::guard('admin')->check()) return redirect()->route('admin.login');
    // })->where(['all' => '.*']);
});

Route::middleware('auth.admin')->group(function () {
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::post('/shop/update_photos', [\App\Http\Controllers\Admin\ShopController::class, 'updatePhotos']);
    Route::resource('/shop', \App\Http\Controllers\Admin\ShopController::class);
});

