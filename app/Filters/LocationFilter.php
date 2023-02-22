<?php

namespace App\Filters;

use App\Filters\BaseFilter;
use App\Models\Area;
use Illuminate\Database\Eloquent\Collection;

/**
 * @param $items = [
 *   [
 *      'name' => string,                      -- query option name
 *      'label' => string                      -- label for otion
 *      'attributes' => array ['key'=>'value'] -- any html attributes
 *      '*relations*' => array                 -- relations items
 *   ]
 * ];
 */

class LocationFilter extends BaseFilter
{
    private array $filters;

    public function __construct(
        string $name,
        string $label,
        array $filters,
        array $attributes = [],
    ) {
        parent::__construct($name, $label, $attributes);
        $this->filters = $filters;
    }

    public function getItems(int $city_id): Collection
    {
        if (!$city_id) return new  Collection([]);
        return Area::getByCityIdWithSubways($city_id)->get();
    }
}
