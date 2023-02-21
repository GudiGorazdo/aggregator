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
    public function getItems(int $id): Collection
    {
        if (!$id) return new  Collection([]);
        return Area::getByCityIdWithSubways($id)->get();
    }
}
