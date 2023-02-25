<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/location/{id}', 'App\Http\Controllers\LocationController@location');
// Route::get('/cities', 'App\Http\Controllers\LocationController@cities');
// Route::get('/location_cookie', 'App\Http\Controllers\LocationController@locationCookie');

Route::get('/location/{id}', [App\Http\Controllers\LocationController::class, 'location']);
Route::get('/cities', [App\Http\Controllers\LocationController::class, 'cities']);
Route::get('/location_cookie', [App\Http\Controllers\LocationController::class, 'locationCookie']);
