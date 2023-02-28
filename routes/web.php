<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use \App\Http\Controllers\CookieController;

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
//
// \App\Services\GenerateRandomData::generateRandomData();

// \App\Services\GenerateRandomData::generateRandomAdminUser();

// dd(str('filters')->append('what??')->append('second')->append(['asdf', 'asdfas']));
// \App\Filters\LocationFilter::apply();

// dd(Carbon::now()->hour);

// dd(CookieController::setCookie('user', 'asjkdfkjhasdf'));
// CookieController::setCookie('user', 'asjkdfkjhasdf');

// HOME PAGE
Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('home');


// Route::middleware("guest")->group(function () {
//     Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
// });
// Route::middleware("auth")->group(function () {
//     Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
//     Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login_process');
// });

Route::get('/test', function () {
    return \App\Models\City::with('areas')->with('subways')->get();
});
