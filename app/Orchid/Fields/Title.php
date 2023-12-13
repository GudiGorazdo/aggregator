<?php

namespace App\Orchid\Fields;

use Orchid\Screen\Field;

class Title extends Field
{
    protected $attributes = ['class' => ''];
    /**
     * The field view.
     *
     * @var string
     */
    public $view = 'orchid.fields.title';

    public function text(string $class): self
    {
        $this->attributes['class'] = $class;

        return $this;
    }
}
