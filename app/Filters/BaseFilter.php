<?php
namespace App\Filters;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Stringable;
use Illuminate\Http\Request;

abstract class BaseFilter
{
    private string $label;
    private string $name;
    private Array $attributes;

    public function __construct(
        string $name,
        string $label,
        Array $attributes = []
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->attributes = $attributes;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAttribute(string $name): string
    {
        if (isset($this->attributes[$name])) return $this->attributes[$name];
        else return '';
    }

    public function render(): View|Factory|Application
    {
        $request = app(Request::class)->all();
        return view('filters.' . $this->getName(), ['filter' => $this, 'request' => $request]);
    }
}
