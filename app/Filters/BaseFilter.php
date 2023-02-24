<?php
namespace App\Filters;
/*
$this->name = $name;                              -- Имя фильтра соответствовует имени view шаблона, а также имени переменной в запросе
$this->label = $label;                            -- Лэйбл используется для заголовка фильтра
$this->attributes = $attributes;                  -- HTML атрибуты, которые будут использованы в view шаблоне
$this->request = app(Request::class)->get($name); -- Данные из запроса
$generalRender = false;                           -- Для провверки рендерить в общем цикле или нет
*/
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

abstract class BaseFilter
{
    public bool $groupRender;

    public null|string $cookie;
    protected string $label;
    protected string $name;
    protected string $field;
    protected array $attributes;
    protected string|null $related;
    protected array $request;

    public function __construct(
        string $name,
        string $label,
        string $field,
        array $attributes = [],
        string $related = null,
        bool $groupRender = true,
        null|string $cookie = null,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->field = $field;
        $this->attributes = $attributes;
        $this->related = $related;
        $this->groupRender = $groupRender;
        $this->cookie = $cookie;
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
        // // dd(Cookie::get(CookieConstants::CITY));
        // \App\Services\Helper::log($city_id, __DIR__);
        if ($city_id && $this->cookie ) {
            Cookie::queue($this->cookie, $city_id);
        } else if ($this->cookie && Cookie::get($this->cookie)) {
            $city_id = Cookie::get($this->cookie);
        }
        return view('filters.' . $this->getName(), ['filter' => $this, 'request' => $this->request, 'city_id' => $city_id]);
    }

    public function generalRender(int|null $city_id = null): null|View|Factory|Application
    {
        if ($this->groupRender) return $this->render($city_id);
        return null;
    }

    public function responseRender(array|int|null $params = null): Response
    {
        $request = $this->request;
        $filter = $this;
        $view = 'filters.response.' . $this->getName();
        return response()->view($view, compact('filter', 'params', 'request'));
    }

    private function setCoockie($value)
    {
        if ($this->cookie) {
            Cookie::queue($this->cookie, Cookie::raw($value), 3000, null, false);
        }
    }

    public function apply(Builder $query): Builder
    {
        $value = $this->request[$this->name] ?? false;
        if (is_string($value)) {
            $query = $query->where($this->field, $value);
            $this->setCoockie($value);
            dd($value, Cookie::get($this->cookie));
        }
        if (is_array($value)) $query = $query->whereIn($this->field, $value);
        return $query;
    }
}
