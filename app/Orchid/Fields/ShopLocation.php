<?php

namespace App\Orchid\Fields;

use Orchid\Screen\Field;

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

    public function shop(int|null $shopID)
    {
        $this->attributes['shopID'] = $shopID;

        return $this;
    }
}
