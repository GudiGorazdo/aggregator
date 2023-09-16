<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use \App\Models\Shop;
use \App\Services\TitleService;
use \App\Http\Controllers\CookieController;
use \App\Http\Controllers\LocationController;
use \App\Constants\CookieConstants;

class ShopController extends Controller
{
    use \App\Http\Controllers\Traits\ShopTrait;

    public function index(Request $request): View
    {
        $shops = Shop::filter()->get();
        $title = TitleService::getHomePage($request, $shops);
        $cityID = LocationController::getCityID();
        return view('pages.home', compact('shops', 'title', 'cityID'));
    }

    public function show(string $id): View|RedirectResponse
    {
        $shop = Shop::getByID((int)$id)->get()->first();
        if (!$shop) return redirect()->route('undefined');
        CookieController::setCookie(CookieConstants::LOCATION, $shop->city_id, CookieController::getYears(1));
        $data = $this->getShopData($shop);

        return view('pages.shop.index', [
            'shop' => $shop,
            'timeBeforeClose' => TitleService::getTimeBeforeClose($shop),
            'similar' => $this->getShopSimilars($shop),
            'photos' => $data['photos'],
            'services' => $data['services'],
            'workingMode' => $data['workingMode'],
            'prices' => $data['prices'],
            'additionalPhones' => $data['additionalPhones'],
        ]);
    }
}


