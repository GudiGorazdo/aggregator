<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use \App\Models\Shop;
use \App\Services\TitleService;
use \App\Http\Controllers\CookieController;
use \App\Http\Controllers\LocationController;
use \App\Constants\CookieConstants;

class ShopController extends Controller
{
    private $perPage = 5;

    public function index(Request $request): View
    {
        $shops = Shop::filter()->get();
        // $shops = $this->getShopListPaginated($request->input('page', 1));
        $title = TitleService::homePage($request, $shops);
        $cityID = LocationController::getCityID();
        return view('pages.home.index', compact('shops', 'title', 'cityID'));
    }

    public function shopList(Request $request): View
    {
        $shops = $this->getShopListPaginated($request->input('page', 1));
        return view('layouts.shop-list-items', ['shops' => $shops]);
    }

    private function getShopListPaginated(int $page)
    {
        return Shop::filter()->paginate($this->perPage, ['*'], 'page', $page);
    }

    public function show(string $id): View|RedirectResponse
    {
        $shop = Shop::getByID((int)$id)->get()->first();
        if (!$shop) return redirect()->route('undefined');
        CookieController::setCookie(CookieConstants::LOCATION, $shop->city_id, CookieController::getYears(1));

        return view('pages.shop.index', [
            'shop' => $shop,
            'web' => json_decode($shop->web),
            'additionalPhones' => json_decode($shop->additional_phones),
            'workingMode' => $shop->workingMode->keyBy('day_of_week'),
            'categories' => $shop->categories->map(function ($category) use ($shop) {
                $category->subCategories = $shop->subCategories->filter(function ($subCategory) use ($category) {
                    return $subCategory->category_id === $category->id;
                })->keyBy('id');
                return $category;
            }),
            'prices' => $shop->prices->groupBy('category_id')->map(function ($categoryGroup) {
                return [
                    'max' => $categoryGroup->max('price'),
                    'items' => $categoryGroup->keyBy('sub_category_id')
                ];
            }),
            'similars' => $this->getShopSimilars($shop),
        ]);
    }

    public function getShopSimilars(Shop $shop): Collection
    {
        $shopSubCategories = $shop->subCategories->pluck('id')->toArray();
        return Shop::similarFilter(+$shop->city_id, +$shop->id, $shopSubCategories)->get();
    }
}
