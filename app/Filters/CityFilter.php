<?php

namespace App\Filters;

use App\Filters\BaseFilter;
use \App\Http\Controllers\CookieController;
use App\Http\Controllers\LocationController;

class CityFilter extends BaseFilter
{
    public function __construct(
        string $name,
        string $label,
        string $field,
        array $attributes = [],
        string $related = null,
        bool $groupRender = true,
        null|string $cookie = null,
    ) {
        parent::__construct( $name, $label, $field, $attributes, $related, $groupRender, $cookie);
        // $this->request = app(Request::class)->all();

        if (!isset($this->request[$name])) {
            !$this->request[$name] = CookieController::getCookie($cookie) ?? LocationController::getStartCityId();
        }

        // dd($this->request[$name]);
    }
}
