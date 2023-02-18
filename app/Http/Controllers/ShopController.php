<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $shops = Shop::paginate(10);
        $requestData = $request->all();
        // \App\Services\Helper::log($requestData, __DIR__);
        // \App\Services\Helper::log(array_key_exists("work_now", $requestData), __DIR__);
        return view('pages.home', compact('shops', 'requestData'));
    }
}
