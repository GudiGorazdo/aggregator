<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Shop;
use \App\Services\TitleService;
use \App\Traits\GetDayTime;

class ShopController extends Controller
{
    use GetDayTime;

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
        foreach($shop->services as $service) {
            $comments[$service->id] = json_decode($service->pivot->comments) ?? [];
        }
        $timeBeforeClose = TitleService::getTimeBeforeClose($shop);
        foreach($shop->workingMode->toArray() as $day) {
            $workingMode[] = [
                'day' => self::getDayNumByNum((int) $day['day_of_week']),
                'is_open' => $day['is_open'],
                'open' => substr($day['open_time'], 0, -3),
                'close' => substr($day['close_time'], 0, -3)
            ];
        }
        return view('pages.shop', compact('shop', 'photos', 'timeBeforeClose', 'comments', 'workingMode'));
    }
}
