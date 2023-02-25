<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    /*
    string $id                      -- id чекбокса, для
    bool $line                      -- стиль без классического чекбокса, просто линия
    string $classesWrapper          -- классы обёртки
    string $classesInput            -- классы инпута
    string $classesLabel            -- классы лэйбла
    string $dataset                 -- дата сет в виде строки
    bool $active                    -- состояние по умолчанию, выбран лм чекбокс
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
