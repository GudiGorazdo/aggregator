<?php
namespace App\Orchid\Screens;

use Orchid\Screen\Fields\Group;

class GroupExt extends Group
{
    protected $view = 'orchid.layouts.group';

    public function title(string $title): self
    {
        $this->attributes['title'] = $title;

        return $this;
    }
}
