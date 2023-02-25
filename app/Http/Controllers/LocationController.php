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
    public function cities(): Response
    {
        return response(City::getAll()->get());
    }

    public function location($id): Response
    {
        $filter = app(\App\Services\FilterService::class)->getFilterByName('LocationFilter');
        if ($filter) {
            return $filter->responseRender($id);
        }
        return response(false);
    }

    public function locationCookie(): Response
    {
        $city = CookieController::getCookie(CookieConstants::LOCATION);
        return response($city);
    }

    public static function getStartCityId(): string
    {
        return '2';
    }
}
