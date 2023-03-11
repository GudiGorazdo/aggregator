<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth.admin')->group(function () {
    Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::resource('shops', App\Http\Controllers\Admin\ShopController::class);
    Route::get('shops/update_photos', [App\Http\Controllers\Admin\ShopController::class, 'updatePhotos']);
});

Route::middleware('guest.admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('home');
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
    Route::any('{all}', function () {
        return redirect()->route('admin.home');
    })->where(['all' => '.*']);
});
