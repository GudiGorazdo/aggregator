<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Response;

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
        // \App\Services\Helper::log($filter, __DIR__);
        if ($filter) {
            return $filter->responseRender($id);
        }
        return response(false);
    }
}
