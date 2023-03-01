<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\CookieController;
use App\Constants\CookieConstants;
use App\Models\Area;
use App\Models\City;
use App\Models\SubCategory;
use App\Models\Subway;

class TitleService
{
    static function getHomePage(Request $request, Collection $shops): string
    {
        $categories = self::getCategories($request);
        $areas = self::getAreas($request, $shops);

        $city = self::getCityTitle($request, $shops);

        $location = '';
        if ($areas != '') $location = ' в ' . $areas;
        else if ($city != '') $location = ' в ' . $city;

        $title = $categories . $location;
        if ($title == '') return 'Все скупки';
        else if (($categories == '') && ($location != '')) return 'Все скупки' . $location;
        else if (($location == '') && ($categories != '')) return 'Все скупки' . $categories;

        return 'Скупки ' . $title;
    }

    private static function getAreas(Request $request, Collection $shops): string
    {
        $areas_ids = $request->get('area') ?? [];
        $areas = Area::whereIn('id', $areas_ids)->get();
        $areasTitles = $areas->map(function ($area, $key) {
            return $area->name_for_title;
        });

        $areasTitles = $areasTitles->toArray();

        $subway_ids = $request->get('subway') ?? [];
        $subways = Subway::with('area')->whereIn('id', $subway_ids)->get();
        $subwaysAreas = $subways->map(function ($subway, $key) {
            return $subway->area->name_for_title;
        });

        $areasTitles = [... $areasTitles, ... $subwaysAreas->toArray()];

        $areasTitles = array_values(array_unique($areasTitles));
        $string = self::getStringFromAtrray($areasTitles);


        if (count($areasTitles) == 1) $string .= ' районе';
        else if ($string != '') $string .= ' районах';

        return $string;
    }

    private static function getCityTitle(Request $request, Collection $shops): string
    {
        $city = $shops->map(function ($shop, $key) {
            return $shop->city->name_for_title;
        });
        $city = array_values($city->unique()->toArray());

        if (count($city) < 1) {
            $city_id = $request->get('city') ?? CookieController::getCookie(CookieConstants::LOCATION) ?? false;
            if ($city_id) {
                $city = City::where('id', $city_id)->get()->first();
                if ($city) $city = [$city['name_for_title']];
                else $city = [];
            } else {
                $city = [];
            }
        }

        if (count($city) > 1) return '';
        else if (isset($city[0])) return $city[0];

        return '';
    }

    private static function getCategories(Request $request): string
    {
        $subCategoriesIds = $request->get('sub_category') ?? [];
        $subCategories = SubCategory::with('category')->whereIn('id', $subCategoriesIds)->get();
        $categoriesTitles = $subCategories->map(function ($subCategory, $key) {
            return $subCategory->category->name_for_title;
        });
        $categoriesTitles = $categoriesTitles->unique();
        $categoriesTitles = array_values($categoriesTitles->unique()->toArray());

        $string = self::getStringFromAtrray($categoriesTitles);

        return $string;
    }

    private static function getStringFromAtrray(array $arr): string
    {
        if (count($arr) < 1) return '';

        $string = $arr[0];
        for ($i = 1; $i < count($arr); $i++) {
            if (isset($arr[$i + 1])) $separator = ', ';
            else $separator = ' и ';
            $string .= $separator . $arr[$i];
        }

        return $string;
    }

    public static function getTimeBeforeClose(Model $shop): string
    {
        $timezone = 'Etc/GMT-' . (3 + $shop->city->timezone);
        $now = mb_strtolower(Carbon::now($timezone)->format('l Y-m-d H:i:s'));
        $nowData = explode(' ', $now);
        $shopOpen = $shop->workingMode[$nowData[0] . '_open'];
        $shopClose = $shop->workingMode[$nowData[0] . '_close'];

        $openTime = Carbon::parse($nowData[1] . ' ' . $shopOpen . ":00:00");
        $closeTime = Carbon::parse($nowData[1] . ' ' . $shopClose . ":00:00");
        $nowTime = Carbon::parse($nowData[1] . ' ' . $nowData[2]);

        if ($shopOpen == 24) return 'Магазин открыт круглосуточно';

        if ($closeTime->gt($nowTime) && !$closeTime->gt($openTime)) {
            $timeBeforeClose = explode(':', $closeTime->diff($nowTime)->format('%H:%I'));
            if ($timeBeforeClose[0][0] == '0') $timeBeforeClose[0] = $timeBeforeClose[0][1];
            return 'До закрытия магазина осталось '
                . $timeBeforeClose[0]
                . ' '
                . self::getNumEnding((integer)$timeBeforeClose[0], array('час', 'часа', 'часов'))
                . ' '
                . $timeBeforeClose[1]
                . ' '
                . self::getNumEnding((integer)$timeBeforeClose[1], array('минута', 'минуты', 'минут'))
            ;
         } else if ($closeTime->gt($openTime)) {
            return 'Магазин откроется сегодня в '
                . $shopOpen
                . ' '
                . self::getNumEnding($shopOpen, array('час', 'часа', 'часов'))
            ;
         } else {
            $nextWorkDayData = self::getNextWorkDay($shop, $nowData[0]);
            return 'Магазин откроется '
                . self::getDayName($nextWorkDayData[0])
                . ' в '
                . $shop->workingMode[$nextWorkDayData[0] . '_open']
                . ' '
                . self::getNumEnding($shop->workingMode[$nextWorkDayData[0] . '_open'], array('час', 'часа', 'часов'))
            ;
        }
    }

    private static function getDayName(string $name): string
    {
        switch($name) {
            case 'monday':
                return 'в понедельник';
            case 'tuesday':
                return 'во вторник';
            case 'wednesday':
                return 'в среду';
            case 'thursday':
                return 'в четверг';
            case 'friday':
                return 'в пятницу';
            case 'saturday':
                return 'в субботу';
            case 'sunday':
                return 'в воскресенье';
        }
    }

    private static function getNumEnding(int $number, array $endingArray): string
    {
        $number = $number % 100;
        if ($number>=11 && $number<=19) {
            $ending=$endingArray[2];
        }
        else {
            $i = $number % 10;
            switch ($i)
            {
                case (1): $ending = $endingArray[0]; break;
                case (2):
                case (3):
                case (4): $ending = $endingArray[1]; break;
                default: $ending=$endingArray[2];
            }
        }
        return $ending;
    }

    private static function getNextWorkDay(Model $shop, string $date): array
    {
        $day = 1;
        $next = mb_strtolower(Carbon::parse($date)->addDays($day)->format('l Y-m-d H:i:s'));
        $data = explode(' ', $next);
        while(is_null($shop->workingMode[$data[0] . '_open'])) {
            $day++;
            $next = mb_strtolower(Carbon::parse($date)->addDays($day)->format('l Y-m-d H:i:s'));
            $data = explode(' ', $next);
        }
        return $data;
    }
}
