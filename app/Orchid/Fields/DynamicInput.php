<?php

namespace App\Orchid\Fields;

use Orchid\Screen\Field;

class DynamicInput extends Field
{
    public function __construct()
    {
        // parent::__construct();
        $this->addBeforeRender(function () {
            $mask = $this->get('mask');

            if (is_array($mask)) {
                $this->set('mask', json_encode($mask));
            }
        });
    }

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
    public function values(array $values = [])
    {
        $this->attributes['values'] = $values;

        return $this;
    }

    public function useNames(string $lableName, string $lableValue)
    {
        $this->attributes['useNames'] = true;
        $this->attributes['lableName'] = $lableName;
        $this->attributes['lableValue'] = $lableValue;

        return $this;
    }
}
