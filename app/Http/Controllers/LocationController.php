<?php

namespace App\Http\Controllers;

use App\Constants\CookieConstants;
use App\Models\City;
use Illuminate\Http\Response;
use \App\Http\Controllers\CookieController;

class LocationController extends Controller
{
    public $errors = [];
    public $response;

    public static function getCityID(): int
    {
        $city = CookieController::getCookie(CookieConstants::LOCATION) ?? null;
        if (!$city) $city = City::START_CITY;
        CookieController::setCookie(CookieConstants::LOCATION, $city, CookieController::getYears(1));
        return $city;
    }

    public function cities(): Response
    {
        return response(City::getAll()->get());
    }

    public function location(): Response
    {
        $filter = app(\App\Services\FilterService::class)->getFilterByName('location');
        return response($filter->getItems(self::getCityID()));
    }
}


