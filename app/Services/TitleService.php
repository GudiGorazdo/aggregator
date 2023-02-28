<?php

namespace App\Services;

use App\Constants\CookieConstants;
use App\Http\Controllers\CookieController;
use App\Models\Area;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
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
}
