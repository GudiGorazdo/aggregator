<?php

namespace App\Orchid\Fields;

use Orchid\Screen\Field;

class DynamicInput extends Field
{
    /**
     * The field view.
     *
     * @var string
     */
    public $view = 'orchid.fields.dynamic-input';

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
    public function values(array $values)
    {
        $this->attributes['values'] = $values;

        return $this;
    }

    public function useNames()
    {
        $this->attributes['useNames'] = true;

        return $this;
    }
}
