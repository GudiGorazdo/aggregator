<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// dd((new App\Filters\LocationFilter('f', 'a'))->getItems(1));
// $x = App\Filters\LocationFilter::getItems(1);
// dd($x[1]->subways->toArray());


Route::get('/', 'App\Http\Controllers\ShopController@index');
Route::get('/cities', 'App\Http\Controllers\LocationController@cities');
Route::get('/location/{id}', 'App\Http\Controllers\LocationController@location');
Route::get('/subways', 'App\Http\Controllers\LocationController@subways');

Route::get('/test', function () {
    return \App\Models\City::with('areas')->with('subways')->get();
});
