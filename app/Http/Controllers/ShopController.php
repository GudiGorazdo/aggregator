<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Shop;
use \App\Services\TitleService;
use \App\Traits\GetDayTime;
use \App\Traits\GetNumEndingTrait;

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
        $photos = json_decode($shop->photos);
        $additionalPhones = json_decode($shop->additional_phones) ?? [];
        foreach ($shop->services as $service) {
            $serviceCommments = json_decode($service->pivot->comments) ?? [];
            $services[] = [
                'id' => $service->id,
                'name' => $service->name,
                'rating' => $service->pivot->rating,
                'comments_count_title' => count($serviceCommments) . ' ' . $this->getNumEnding(count($serviceCommments), array('отзыв', 'oтзыва', 'отзывов')),
                'comments' => $serviceCommments,
                'link' =>  $service->link
            ];
        }
        $timeBeforeClose = TitleService::getTimeBeforeClose($shop);
        foreach ($shop->workingMode->toArray() as $day) {
            $workingMode[] = [
                'day' => self::getDayNumByNum((int) $day['day_of_week']),
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

        return view('pages.shop.index', compact('shop', 'photos', 'timeBeforeClose', 'services', 'workingMode', 'prices', 'additionalPhones'));
    }
}
