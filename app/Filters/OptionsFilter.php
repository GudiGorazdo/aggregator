<?php

namespace App\Filters;

use App\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

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
        return (int)Carbon::now()->hour;
    }

    public function workNow(Builder $query): Builder
    {
        $query = $query->whereHas('workingMode', function (Builder $query) {
            return $query = $query
                ->where($this->getDay() . '_open', '<', $this->getTime())
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


            }
        }
        if (is_string($value)) $query = $query->where($this->field, $value);
        if (is_array($value)) $query = $query->whereIn($this->field, $value);
        return $query;
    }
}
