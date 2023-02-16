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
// \App\Models\City::generate(20);
// \App\Models\Area::generate(100);
// \App\Models\Subway::generate(100);
// \App\Models\Subway::generateShopsSubways();
// \App\Models\Shop::generate(100);

// \App\Models\SubCategory::generate(50);
// \App\Models\Category::generate(10);
// \App\Models\Category::generateShopsCategories();
// \App\Models\SubCategory::generateShopsSubCategories();

Route::get('/', 'App\Http\Controllers\ShopController@index');
