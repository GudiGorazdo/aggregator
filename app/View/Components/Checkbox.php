<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    private string $linePostfix = '--line';
    public string $classNameWrapper = 'form-check';
    public string $classNameInput = 'form-check-input';
    public string $classNameLabel = 'form-check-label';
    public string $active = '';
    public string $dataset = '';

    public string $id;

    public function __construct(
        string $id,
        bool $line = false,
        string $classWrapper = '',
        string $classInput = '',
        string $classLabel = '',
        string $dataset = '',
        bool $active = false
    ) {
        $this->id = $id;
        if  ($line) {
            $this->classNameWrapper .= ' ' . $this->classNameWrapper . $this->linePostfix;
            $this->classNameInput .= ' ' . $this->classNameInput . $this->linePostfix;
            $this->classNameLabel .= ' ' . $this->classNameLabel . $this->linePostfix;
        }
        $this->classNameWrapper .= ' ' . $classWrapper;
        $this->classNameInput .= ' ' . $classInput;
        $this->classNameLabel .= ' ' . $classLabel;
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
