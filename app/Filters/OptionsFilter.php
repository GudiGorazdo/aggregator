<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use App\Filters\BaseFilter;
use \App\Http\Controllers\CookieController;
use \App\Constants\CookieConstants;

/**
 * @param $items = [
 *   [
 *      'name' => string,                      -- имя переменной в запросе, желательно соответствие названию скоупа
 *      'label' => string                      -- заголовок для отображения
 *   ]
 * ];
 */

class OptionsFilter extends BaseFilter
{
    private $items = [];

    public function __construct(array $items, string $name = 'options', $label = 'Опции')
    {
        parent::__construct($name, $label, '');
        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getDay(): string
    {
        return strtolower(Carbon::now()->isoFormat('dddd'));
    }

    public function getTime(): int
    {
        $city_id = $this->request['city'] ?? CookieController::getCookie(CookieConstants::LOCATION);
        if (!$city_id) dd("Потерялся ид города!!!");
        return (int)Carbon::now()->hour;
    }

    public function workNow(Builder $query): Builder
    {
        $query = $query->whereHas('workingMode', function (Builder $query) {
            return $query->where($this->getDay() . '_open', '<', $this->getTime())
                ->where($this->getDay() . '_close', '>', $this->getTime())
            ;
        });
        return $query;
    }

    public function apply(Builder $query): Builder
    {
        foreach ($this->getItems() as $filter) {
            $value = $this->request[$filter['name']] ?? false;
            if ($value) {
                if ($filter['name'] == 'work_now') {
                    $this->workNow($query);
                    continue;
                }
                $query = $query->where($filter['name'], 1);
            }
        }
        return $query;
    }
}
