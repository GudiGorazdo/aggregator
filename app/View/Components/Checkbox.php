<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    /*
        @param string $id                      -- id чекбокса, для
        @param bool $line                      -- стиль без классического чекбокса, просто линия
        @param string $classesWrapper          -- классы обёртки
        @param string $classesInput            -- классы инпута
        @param string $classesLabel            -- классы лэйбла
        @param string $dataset                 -- дата сет в виде строки
        @param bool $active                    -- состояние по умолчанию, выбран лм чекбокс
    */
    private string $linePostfix = '--line';
    public string $classNamesWrapper = 'form-check';
    public string $classNamesInput = 'form-check-input';
    public string $classNamesLabel = 'form-check-label';
    public string $active = '';
    public string $dataset = '';

    public string $id;

    public function __construct(
        string $id,
        bool $line = false,
        string $classesWrapper = '',
        string $classesInput = '',
        string $classesLabel = '',
        string $dataset = '',
        bool $active = false
    ) {
        $this->id = $id;
        if  ($line) {
            $this->classNamesWrapper .= ' ' . $this->classNamesWrapper . $this->linePostfix;
            $this->classNamesInput .= ' ' . $this->classNamesInput . $this->linePostfix;
            $this->classNamesLabel .= ' ' . $this->classNamesLabel . $this->linePostfix;
        }
        $this->classNamesWrapper .= ' ' . $classesWrapper;
        $this->classNamesInput .= ' ' . $classesInput;
        $this->classNamesLabel .= ' ' . $classesLabel;
        $this->dataset = $dataset;
        $this->active = $active ? 'checked' : '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkbox');
    }
}
