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
use \App\Services\CityTimeService;
use \App\Services\DayService;
use \App\Helpers;

class TitleService
{
    public static function homePage(Request $request, Collection $shops): string
    {
        $categories = self::getCategories($request);
        $areas = self::getAreas($request, $shops);
        $city = self::getCity($request, $shops);

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

        $subwayIDs = $request->get('subway') ?? [];
        $subways = Subway::with('area')->whereIn('id', $subwayIDs)->get();
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

    private static function getCity(Request $request, Collection $shops): string
    {
        $city = $shops->map(function ($shop, $key) {
            return $shop->city->name_for_title;
        });
        $city = array_values($city->unique()->toArray());

        if (count($city) < 1) {
            $cityID = $request->get('city') ?? CookieController::getCookie(CookieConstants::LOCATION) ?? false;
            if ($cityID) {
                $city = City::where('id', $cityID)->get()->first();
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

    public static function timeBeforeClose(Model $shop, bool $justTime = false): string
    {
        $dayNum = DayService::getDayNumByDate(CityTimeService::getDate($shop->region->timezone));
        $shopOpen = $shop->workingMode[(int)$dayNum - 1]['open_time'];
        $shopClose = $shop->workingMode[(int)$dayNum - 1]['close_time'];
        $shopIsOpen = $shop->workingMode[(int)$dayNum - 1]['is_open'];

        [$year, $time] = explode(' ', CityTimeService::getFullTimeAndDate($shop->region->timezone));
        $openTime = $shopOpen ? Carbon::parse($time . ' ' . $shopOpen) : null;
        $closeTime = $shopClose ? Carbon::parse($time . ' ' . $shopClose) : null;
        $nowTime = Carbon::parse($time . ' ' . $year);

        if (!$shopIsOpen) return 'Магазин закрыт';

        if (!is_null($closeTime) && $closeTime->greaterThan($nowTime) && $closeTime->greaterThan($openTime)) {
            $timeBeforeClose = explode(':', $closeTime->diff($nowTime)->format('%H:%I'));
            if ($timeBeforeClose[0][0] == '0') $timeBeforeClose[0] = $timeBeforeClose[0][1];
            if ($justTime) return "Работает до " . $shopClose;
            return 'До закрытия магазина осталось '
                . $timeBeforeClose[0]
                . ' '
                . getNumEnding((int)$timeBeforeClose[0], array('час', 'часа', 'часов'))
                . ' '
                . $timeBeforeClose[1]
                . ' '
                . getNumEnding((int)$timeBeforeClose[1], array('минута', 'минуты', 'минут'))
            ;
         } else if (is_null($closeTime) && $nowTime->greaterThan($openTime)) {
            return 'Магазин открыт круглосуточно';
        } else {
            return 'Магазин закрыт';
        }

        return '';
    }
}


