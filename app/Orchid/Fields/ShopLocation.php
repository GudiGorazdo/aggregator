<?php

namespace App\Orchid\Fields;

use Orchid\Screen\Field;
use Illuminate\Database\Eloquent\Collection;

class ShopLocation extends Field
{
    /**
     * The field view.
     *
     * @var string
     */
    public $view = 'orchid.fields.shop-location';

    /**
     * Values for the dynamic input.
     *
     * @var array
     */

    /**
     * Set the values for the dynamic input.
     *
     * @param array $values
     *
     * @return $this
     */
    public function type(string $type)
    {
        $this->attributes['type'] = $type;

        return $this;
    }

    public function shop(int $edit, int|null $regionID, int|null $cityID, int|null $areaID, string|null $subways)
    {
        $this->attributes['edit'] = $edit;
        $this->attributes['regionID'] = $regionID ?? 0;
        $this->attributes['cityID'] = $cityID ?? 0;
        $this->attributes['areaID'] = $areaID ?? 0;
        $this->attributes['subways'] = $subways ?? 0;

        return $this;
    }

    public function inputs(array $inputs)
    {
        $this->attributes['inputs'] = $inputs;

        return $this;
    }
}
