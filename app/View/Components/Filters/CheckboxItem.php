<?php

namespace App\View\Components\Filters;

use Illuminate\View\Component;

class CheckboxItem extends Component
{
    /*
        @param string $label                -- лэйбл чекбокса;
        @param string $id                   -- ид инпута;
        @param string $dataset              -- датасет инпута, формируется из массива $groups,
                                               нужен для группировки чекбоксов;
        @param array $groups = [
            'name' => 'string,              -- имя группы;
            'type' => string,               -- название дата атрибута (data-type);
            'value_prefix' => string,       -- префикс названия дата атрибута (data-value_prefixtype);
            'value' => string               -- необязательный параметр - значение дата атрибута (data-value_prefixtype="value");
        ]
        @param bool $active                 -- чекбокс checked;
        @param string $filter               -- название фильтра;
        @param string $value                -- значение атрибута value чекбокса;
        @param string $groupfield           -- название поля в Collection, используется в качестве ;
                                               value дата атрибута для саязи групп чекбоксов;
    */
    public string $label;
    public string $id;
    public string $dataset = '';
    public array $groups;
    public bool $active;
    public string $filter;
    public string $value;

    public function __construct(
        object $item,
        string $filter,
        array $request,
        array $groups = [],
        string $groupfield = ''
    ) {
        $this->label = $item->name;
        $this->filter= $filter;
        $this->id = $filter . '_' . $item->id;
        $this->value = $item->id;
        $this->active = isset($request[$this->filter]) && in_array($item->id, $request[$this->filter]);
        $this->groups = $groups;
        if (count($this->groups) > 0) {
            $this->dataset = \App\Services\Helper::getDataSetString($groups, $item[$groupfield]);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filters.checkbox-item');
    }
}
