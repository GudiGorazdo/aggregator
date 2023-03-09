<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\BaseFilter;
use App\Constants\CookieConstants;
use \App\Http\Controllers\CookieController;

class CityFilter extends BaseFilter
{
    // public function __construct(
    //     string $name,
    //     string $label,
    //     string $field,
    //     array $attributes = [],
    //     string $related = null,
    // ) {
    //     $this->name = $name;
    //     $this->label = $label;
    //     $this->field = $field;
    //     $this->attributes = $attributes;
    //     $this->related = $related;
    //     $this->request = app(Request::class)->all();

    //     // УСЛОВИЕ ПО КОТОРОМУ ПОДГРУЖАЮТСЯ ДАННЫЕ ИЗ КУКИ
    //     if (!isset($this->request[$name])) {
    //         if (!$this->request[$name] = CookieController::getCookie(CookieConstants::LOCATION)) {

    //             // РАСКОМЕНТИРОВАТЬ ЧТОБЫ БЫЛ ДЕФОЛТНЫЙ ГОРОД
    //             // $this->request[$name] = LocationController::getStartCityId();
    //         }
    //     }
    // }

    // Отрисовка фильтра
    public function render(int|null $city_id = null, $group = true)
    {
        return view('filters.' . $this->getName(), ['filter' => $this, 'request' => $this->request, 'city_id' => $city_id]);
    }

    // Фильтрация
    public function apply(Builder $query): Builder
    {
        $value = $this->request[$this->name] ?? false;
        if (!$value) {
            $value = CookieController::getCookie(CookieConstants::LOCATION) ?? false;
        }
        if ($value) {
            CookieController::setCookie(CookieConstants::LOCATION, $value, CookieController::getYears(1));
            return $query->where($this->field, $value);
        }

        return $query;
    }
}
