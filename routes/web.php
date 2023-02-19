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

// \App\Services\GenerateRandomData::generateRandomData();



Route::get('/', 'App\Http\Controllers\ShopController@index');
Route::get('/cities', 'App\Http\Controllers\LocationController@cities');
Route::get('/areas/{id}', 'App\Http\Controllers\LocationController@areas');
Route::get('/subways', 'App\Http\Controllers\LocationController@subways');

Route::get('test', function () {
    $shops = \App\Models\Shop::paginate(10);
    return response()->view('layouts.shop-list', compact('shops'));
});
