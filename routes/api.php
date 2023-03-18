<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/data/cities', [App\Http\Controllers\LocationController::class, 'cities']);
Route::get('/data/location_start', [App\Http\Controllers\LocationController::class, 'getStartCityId']);
Route::get('/data/location_cookie', [App\Http\Controllers\LocationController::class, 'locationCookie']);
