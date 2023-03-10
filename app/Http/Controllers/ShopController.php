<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Shop;
use \App\Services\TitleService;
use \App\Traits\GetDayTime;
use \App\Traits\GetNumEndingTrait;
use \App\Http\Controllers\CookieController;
use App\Constants\CookieConstants;

class ShopController extends Controller
{
    use GetDayTime;
    use GetNumEndingTrait;

    public function index(Request $request): View
    {
        $shops = Shop::filter()->get();
        $title = TitleService::getHomePage($request, $shops);
        return view('pages.home', compact('shops', 'title'));
    }

    public function shop(Request $request, string $id): View
    {
        $shop = Shop::getById(+$id)->get()->first();
        $checkLocationCookie = CookieController::getCookie(CookieConstants::LOCATION) ?? false;
        if (!$checkLocationCookie) {
            CookieController::setCookie(CookieConstants::LOCATION, $shop->city_id, CookieController::getYears(1));
        }
        $photos = json_decode($shop->photos);
        $additionalPhones = json_decode($shop->additional_phones) ?? [];
        foreach ($shop->services as $service) {
            $serviceCommments = json_decode($service->pivot->comments) ?? [];
            $services[] = [
                'id' => $service->id,
                'name' => $service->name,
                'rating' => $service->pivot->rating,
                'comments' => $serviceCommments,
                'link' =>  $service->link,
                'comments_count_title' => count($serviceCommments)
                    . ' '
                    . $this->getNumEnding(count($serviceCommments), array('отзыв', 'oтзыва', 'отзывов'))
            ];
        }
        $timeBeforeClose = TitleService::getTimeBeforeClose($shop);
        foreach ($shop->workingMode->toArray() as $day) {
            $workingMode[] = [
                'day' => self::getDayByNum((int) $day['day_of_week']),
                'is_open' => $day['is_open'],
                'open' => substr($day['open_time'], 0, -3),
                'close' => substr($day['close_time'], 0, -3)
            ];
        }
        foreach ($shop->categories as $key => $category) {
            $subCategories = $shop->subCategories->where('category_id', $category->id);
            foreach ($subCategories as $k => $subCategory) {
                $prices[$key]['data'][$k] = [
                    'name' => $subCategory->name,
                    'price' => $shop->prices->where('sub_category_id', $subCategory->id)->first()->price ?? null
                ];
            }
            $prices[$key]['name'] =  $category->name;
            $prices[$key]['max'] = max(array_column($prices[$key]['data'], 'price')) ?? null;
            $prices[$key]['category_id'] = $category->id;
        }

        $shopSubCategories = $shop->subCategories->pluck('id')->toArray();
        $similar = Shop::similarFilter(+$shop->city_id, +$shop->id, $shopSubCategories)->get();

        // dd($similar->first()->subways->toArray());

        return view('pages.shop.index', compact(
            'shop',
            'photos',
            'timeBeforeClose',
            'services',
            'workingMode',
            'prices',
            'additionalPhones',
            'similar'
        ));
    }
}
