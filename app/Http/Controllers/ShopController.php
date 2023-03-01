<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Shop;
use \App\Services\TitleService;

class ShopController
extends Controller
{
    public function index(Request $request): View
    {
        $shops = Shop::filter()->get();
        $title = TitleService::getHomePage($request, $shops);
        return view('pages.home', compact('shops', 'title'));
    }

    public function shop(Request $request, string $id): View
    {
        $shop = Shop::getById(+$id)->get()->first();
        $photos = json_decode($shop->photos);
        $timeBeforeClose = TitleService::getTimeBeforeClose($shop);
        return view('pages.shop', compact('shop', 'photos', 'timeBeforeClose'));
    }
}
