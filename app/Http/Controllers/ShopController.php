<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Contracts\View\View;
use \App\Services\TitleService;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        $shops = Shop::filter()->get();
        $title = TitleService::getHomePage($request, $shops);
        // dd($title);
        return view('pages.home', compact('shops', 'title'));
    }
}
