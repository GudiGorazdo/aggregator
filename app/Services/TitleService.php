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
use App\Traits\GetNumEndingTrait;
use \App\Traits\GetDayTime;

class TitleService
{
    use GetNumEndingTrait;
    use GetDayTime;

    static function getHomePage(Request $request, Collection $shops): string
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

    private static function getCity(Request $request, Collection $shops): string
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
        $now = mb_strtolower(self::getFullTime($shop->city->timezone));
        $nowData = explode(' ', $now);
        $dayNum = self::getDayNumByName($nowData[0]);
        $shopOpen = $shop->workingMode[(int)$dayNum - 1]['open_time'];
        $shopClose = $shop->workingMode[(int)$dayNum - 1]['close_time'];
        $shopIsOpen = $shop->workingMode[(int)$dayNum - 1]['is_open'];
        $openTime = $shopOpen ? Carbon::parse($nowData[1] . ' ' . $shopOpen) : null;
        $closeTime = $shopClose ? Carbon::parse($nowData[1] . ' ' . $shopClose) : null;
        $nowTime = Carbon::parse($nowData[1] . ' ' . $nowData[2]);


        if (!$shopIsOpen) {
            $nextDayOpen = self::getNextWorkDay($shop, $nowData[0]);
            return 'Магазин откроется '
                . self::getDayWithEndingForOpen($nextDayOpen['day'])
                . ' '
                . $nextDayOpen['date']
                . ' в '
                . substr($nextDayOpen['time'], 0, -3)
            ;
        }

        if ((!$openTime || $openTime->lessThan($nowTime)) && !$closeTime) {
            $nextDayClose = self::getNextCloseDay($shop, $nowData[0]);
            if ($nextDayClose) {
                return 'Магазин открыт до '
                    . self::getDayWithEndingForClose($nextDayClose['day'])
                    . ' '
                    . $nextDayClose['date']
                    . ' '
                    . substr($nextDayClose['time'], 0, -3)
                ;
            }
            return 'Магазин открыт каждый день круглосуточно';
        }

        if ($closeTime->greaterThan($nowTime) && $closeTime->lessThan($openTime)) {
            $timeBeforeClose = explode(':', $closeTime->diff($nowTime)->format('%H:%I'));
            if ($timeBeforeClose[0][0] == '0') $timeBeforeClose[0] = $timeBeforeClose[0][1];
            return 'До закрытия магазина осталось '
                . $timeBeforeClose[0]
                . ' '
                . self::getNumEnding((int)$timeBeforeClose[0], array('час', 'часа', 'часов'))
                . ' '
                . $timeBeforeClose[1]
                . ' '
                . self::getNumEnding((int)$timeBeforeClose[1], array('минута', 'минуты', 'минут'))
            ;
         } else if ($closeTime->greaterThan($openTime)) {
        //  } else if ($openTime && $openTime->greaterThan($nowTime) && $closeTime->greaterThan($openTime)) {
            $timeBeforeOpen = explode(':', $closeTime->diff($openTime)->format('%H:%I'));
            // dd($timeBeforeOpen, $openTime);
            return 'Магазин откроется сегодня через '
                . $shopOpen
                . ' '
                . self::getNumEnding((int)$shopOpen, array('час', 'часа', 'часов'))
            ;
         } else {
            $nextWorkDayData = self::getNextWorkDay($shop, $nowData[0]);
            return 'Магазин откроется '
                . self::getDayWithEndingForOpen($nextWorkDayData['day'])
                . ' '
                . $nextWorkDayData['date']
                . ' в '
                . $nextWorkDayData['time']
                . ' '
                . self::getNumEnding((int)$nextWorkDayData['time'], array('час', 'часа', 'часов'))
            ;
        }
        return '';
    }

    private static function getNextWorkDay(Model $shop, string $date): array|bool
    {
        $day = 1;
        $next = mb_strtolower(Carbon::parse($date)->addDays($day)->format('l d.m.Y H:i:s'));
        $data = explode(' ', $next);
        $dayNum = self::getDayNumByName($data[0]);
        while(!$shop->workingMode[$dayNum - 1]['is_open']) {
            if ($day == 8 ) return false;
            $day++;
            $next = mb_strtolower(Carbon::parse($date)->addDays($day)->format('l d.m.Y H:i:s'));
            $data = explode(' ', $next);
            $dayNum = self::getDayNumByName($data[0]);
        }
        return [
            'day' => $data[0],
            'date' => $data[1],
            'time' => $shop->workingMode[$dayNum - 1]['open_time'],
        ];
    }

    private static function getNextCloseDay(Model $shop, string $date): array|bool
    {
        $day = 1;
        $next = mb_strtolower(Carbon::parse($date)->addDays($day)->format('l d.m.Y H:i:s'));
        $data = explode(' ', $next);
        $dayNum = self::getDayNumByName($data[0]);
        while(!$shop->workingMode[$dayNum - 1]['is_open'] || is_null($shop->workingMode[$dayNum - 1]['close_time'])) {
            if ($day == 8 ) return false;
            $day++;
            $next = mb_strtolower(Carbon::parse($date)->addDays($day)->format('l d.m.Y H:i:s'));
            $data = explode(' ', $next);
            $dayNum = self::getDayNumByName($data[0]);
        }
        return [
            'day' => $data[0],
            'date' => $data[1],
            'time' => $shop->workingMode[$dayNum - 1]['close_time'],
        ];
    }

    private static function getDayWithEndingForOpen(string $name): string
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
    private static function getDayWithEndingForClose(string $name): string
    {
        switch($name) {
            case 'monday':
                return 'понедельника';
            case 'tuesday':
                return 'вторника';
            case 'wednesday':
                return 'среды';
            case 'thursday':
                return 'четверга';
            case 'friday':
                return 'пятницы';
            case 'saturday':
                return 'субботы';
            case 'sunday':
                return 'воскресенья';
        }
    }
}
