<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Area;
use App\Models\Subway;
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
        \App\Services\Helper::log($id, __DIR__);
        $filter = app(\App\Services\FilterService::class)->getFilterByName('LocationFilter');
        if ($filter) {
            return $filter->responseRender($id);
        }
        return response(false);
    }
}
