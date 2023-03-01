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
        foreach($shop->services as $service) {
            $comments[$service->id] = json_decode($service->pivot->comments) ?? [];
        }
        $timeBeforeClose = TitleService::getTimeBeforeClose($shop);
        $workingMode = $this->workingMode($shop->workingMode->toArray());
        return view('pages.shop', compact('shop', 'photos', 'timeBeforeClose', 'comments', 'workingMode'));
    }

    private function workingMode(array $data): array
    {
        $days = ['monday', 'tuesday', 'monday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        function checkLength(mixed $var): string
        {
            $var = (string) $var;
            if (strlen($var) > 1) return $var;
            return '0' . $var;
        }

        return [
            [
                'day' => 'Понедельник',
                'open' => checkLength($data['monday_open']),
                'close' => checkLength($data['monday_close'])
            ],
            [
                'day' => 'Вторник',
                'open' => checkLength($data['tuesday_open']),
                'close' => checkLength($data['tuesday_close'])
            ],
            [
                'day' => 'Среда',
                'open' => checkLength($data['wednesday_open']),
                'close' => checkLength($data['wednesday_close'])
            ],
            [
                'day' => 'Четверг',
                'open' => checkLength($data['thursday_open']),
                'close' => checkLength($data['thursday_close'])
            ],
            [
                'day' => 'Пятница',
                'open' => checkLength($data['friday_open']),
                'close' => checkLength($data['friday_close'])
            ],
            [
                'day' => 'Суббота',
                'open' => checkLength($data['saturday_open']),
                'close' => checkLength($data['saturday_close'])
            ],
            [
                'day' => 'Воскресенье',
                'open' => checkLength($data['sunday_open']),
                'close' => checkLength($data['sunday_close'])
            ],
        ];
    }
}
