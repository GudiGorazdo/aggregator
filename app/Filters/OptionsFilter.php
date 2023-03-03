<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use \App\Filters\BaseFilter;
use \App\Http\Controllers\CookieController;
use \App\Constants\CookieConstants;
use \App\Traits\GetDayTime;
use \App\Models\City;


class OptionsFilter extends BaseFilter
{

    use GetDayTime;

    /**
     * @param $items = [
     *   [
     *      'name' => string,                      -- имя переменной в запросе, желательно соответствие названию скоупа
     *      'label' => string                      -- заголовок для отображения
     *   ]
     * ];
     */
    private $items = [];
    private $city_id = null;
    private $timezone = null;

    public function __construct(array $items, string $name = 'options', $label = 'Опции')
    {
        parent::__construct($name, $label, '');
        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function workNow(Builder $query): Builder
    {
        $query = $query->whereHas('workingMode', function (Builder $query) {
            return $query->where('day_of_week', self::getNowDayNum($this->timezone))
                ->where('is_open', 1)
                ->where(function (Builder $query) {
                        $query->whereTime('open_time', '<', self::getTime($this->timezone))
                            ->orWhereNull('open_time')
                    ;
                })
                ->where(function (Builder $query) {
                        $query->whereTime('close_time', '>', self::getTime($this->timezone))
                            ->orWhereNull('close_time')
                    ;
                })
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
                    $this->city_id = $this->request['city'] ?? CookieController::getCookie(CookieConstants::LOCATION);
                    $this->timezone = City::getById($this->city_id)['timezone'];
                    $this->workNow($query);
                    continue;
                }
                $query = $query->where($filter['name'], 1);
            }
        }
        return $query;
    }
}
