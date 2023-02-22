<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Contracts\View\View;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        $shops = Shop::filter()->paginate(10);
        return view('pages.home', compact('shops'));
    }
}
