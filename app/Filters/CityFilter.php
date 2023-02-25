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

        if (!isset($this->request[$name])) {
            if (!$this->request[$name] = CookieController::getCookie($cookie)) {

                // РАСКОМЕНТИРОВАТЬ ЧТОБЫ БЫЛ ДЕФОЛТНЫЙ ГОРОД
                // $this->request[$name] = LocationController::getStartCityId();
            }
        }
    }
}
