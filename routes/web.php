<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

// \App\Services\GenerateRandomData::generateRandomData();

// dd(str('filters')->append('what??')->append('second')->append(['asdf', 'asdfas']));
// \App\Filters\LocationFilter::apply();

// dd(Carbon::now()->hour);

Route::get('/', 'App\Http\Controllers\ShopController@index');
Route::get('/admin', 'App\Http\Controllers\AuthController@showLoginForm');
Route::get('/test', function () {
    return \App\Models\City::with('areas')->with('subways')->get();
});
