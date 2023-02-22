<?php
namespace App\Filters;
/*
$this->name = $name;                              -- Имя фильтра соответствовует имени view шаблона, а также имени переменной в запросе
$this->label = $label;                            -- Лэйбл используется для заголовка фильтра
$this->attributes = $attributes;                  -- HTML атрибуты, которые будут использованы в view шаблоне
$this->request = app(Request::class)->get($name); -- Данные из запроса
*/
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Stringable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class BaseFilter
{
    private string $label;
    private string $name;
    private array $attributes;
    private array $request;

    public function __construct(
        string $name,
        string $label,
        array $attributes = []
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

    public function render(int|null $city_id = null): View|Factory|Application
    {
        return view('filters.' . $this->getName(), ['filter' => $this, 'request' => $this->request, 'city_id' => $city_id]);
    }

    public function responseRender(array|int|null $params = null): Response
    {
        $request = $this->request;
        $filter = $this;
        $view = 'filters.response.' . $this->getName();
        // \App\Services\Helper::log($params, __DIR__);
        return response()->view($view, compact('filter', 'params', 'request'));
    }

    public function apply(Builder $query): Builder
    {
        // $value = $this->request[$this->name];
        // dd();
        return $query;
    }
}
