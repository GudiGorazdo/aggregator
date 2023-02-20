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
    private Array $request;

    public function __construct(
        string $name,
        string $label,
        Array $attributes = []
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->attributes = $attributes;
        $this->request = app(Request::class)->all();
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

    public function render(int|null $id = null): View|Factory|Application
    {
        return view('filters.' . $this->getName(), ['filter' => $this, 'request' => $this->request, 'id' => $id]);
    }

    public function responseRender(Array|int|null $params = null)
    {
        $request = $this->request;
        $filter = $this;
        $view = 'filters.response.' . $this->getName();
        // \App\Services\Helper::log($this->x(), __DIR__);
        return response()->view($view, compact('filter', 'params', 'request'));
    }
}
