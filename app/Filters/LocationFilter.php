<?php

namespace App\Filters;

use App\Filters\BaseFilter;
use App\Models\Area;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class LocationFilter extends BaseFilter
{
    private $subway;
    private $area;

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

    public function __construct(
        string $name,
        string $label,
        string $field,
        array $attributes = [],
        string $related = null
    ) {
        parent::__construct($name, $label, $field, $attributes, $related);
        $this->subway = $this->request['subway'] ?? false;
        $this->area = $this->request['area'] ?? false;
    }

    public function getItems(int $city_id): Collection
    {
        if (!$city_id) return new  Collection([]);
        return Area::getByCityIdWithSubways($city_id)->get();
    }

    public function apply(Builder $query): Builder
    {
        if ($this->subway) $query = $query->whereHas('subways', function (Builder $query) {
            return $query->whereIn('id', $this->subway);
        });
        else if ($this->area) $query = $query->whereIn('area_id', $this->area);
        return $query;
    }
}
