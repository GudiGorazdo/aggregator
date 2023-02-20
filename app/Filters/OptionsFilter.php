<?php

namespace App\Filters;

use App\Filters\BaseFilter;

/**
 * @param $items = [
 *   [
 *      'name' => string,                      -- query option name
 *      'label' => string                      -- label for otion
 *      'attributes' => array ['key'=>'value'] -- any html attributes
 *   ]
 * ];
 */

class OptionsFilter extends BaseFilter
{
    private $items = [];

    public function __construct(Array $items, string $name = 'options', $label = 'Опции')
    {
        parent::__construct($name, $label);
        $this->items = $items;
    }

    public function getItems(): Array
    {
        return $this->items;
    }
}
