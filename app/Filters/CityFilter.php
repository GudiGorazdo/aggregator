<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\BaseFilter;
use App\Constants\CookieConstants;
use \App\Http\Controllers\CookieController;
use App\Models\City;

class CityFilter extends BaseFilter
{
    // Отрисовка фильтра
    public function render(int|null $city_id = null, $group = true)
    {
        return view('filters.' . $this->getName(), ['filter' => $this, 'request' => $this->request, 'city_id' => $city_id]);
    }

    // Фильтрация
    public function apply(Builder $query): Builder
    {
        $value = $this->request[$this->name] ?? false;
        if (!$value) $value = $this->getCurrentCityId();
        return $query->where($this->field, $value);;
    }

    private function getCurrentCityId(): int
    {
        $value = CookieController::getCookie(CookieConstants::LOCATION) ?? false;
        if (!$value) $value = City::START_CITY;
        CookieController::setCookie(CookieConstants::LOCATION, $value, CookieController::getYears(1));

        return +$value;
    }
}
