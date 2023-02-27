<?php
namespace App\Filters;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Http\Controllers\CookieController;

abstract class BaseFilter
{
    /**
    * @param bool $groupRender            -- Для провверки рендерить в общем цикле или нет;
    *   @param null|string $cookie          -- Имя кук, если есть записываются при фильтрации;
    *   @param string $label                -- Лэйбл используется для заголовка фильтра;
    *   @param string $name                 -- Имя фильтра соответствовует имени view шаблона, а также имени переменной в запросе;
    *   @param string $field                -- Поле в таблице, которое соответствующее фильтру;
    *   @param array $attributes            -- HTML атрибуты;
    *   @param string|null $related         -- Связь основной таблицы фильтра с другой (имя связанной таблицы);
    *   @param array $request               -- Параметры GET запроса;
    */

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

        // УСЛОВИЕ ПО КОТОРОМУ ПОДГРУЖАЮТСЯ ДАННЫЕ ИЗ КУКИ
        if (!isset($this->request[$name]) && $cookie) {
            if (!$this->request[$name] = CookieController::getCookie($cookie)) {

                // РАСКОМЕНТИРОВАТЬ ЧТОБЫ БЫЛ ДЕФОЛТНЫЙ ГОРОД
                // $this->request[$name] = LocationController::getStartCityId();
            }
        }
    }

    // Получить заголовок фильтра
    public function getLabel(): string
    {
        return $this->label;
    }

    // Получить имя фильтра
    public function getName(): string
    {
        return $this->name;
    }

    // Получить HTML атрибут по названию
    public function getAttribute(string $name): string
    {
        if (isset($this->attributes[$name])) return $this->attributes[$name];
        else return '';
    }

    // Если есть данные записать их в куки
    private function checkDataAndSetCookie(int|null $data = null)
    {
        if ($data) {
            CookieController::setCookie($this->cookie, $data, CookieController::getYears(1));
        }
        if (($cookie = CookieController::getCookie($this->cookie)) && ! $data) {
            $data = $cookie;
        }

        return $data;
    }

    // Отрисовка фильтра
    public function render(int|null $city_id = null): View|Factory|Application
    {
        return view('filters.' . $this->getName(), ['filter' => $this, 'request' => $this->request, 'city_id' => $city_id]);
    }

    public function generalRender(int|null $city_id = null): null|View|Factory|Application
    {
        if ($this->groupRender) return $this->render($city_id);
        return null;
    }

    // Ответ сервера в формате tex/html. Возвращается вёрстка.
    public function responseRender(array|int|null $params = null): Response
    {
        $request = app(Request::class)->all();
        $filter = $this;
        $view = 'filters.response.' . $this->getName();
        return response()->view($view, compact('filter', 'params', 'request'));
    }

    // Фильтрация
    public function apply(Builder $query): Builder
    {
        $value = $this->request[$this->name] ?? false;

        if (!$value && $this->cookie) {
            $value = CookieController::getCookie($this->cookie) ?? false;
        }

        if (is_string($value)) {
            $query = $query->where($this->field, $value);
            CookieController::setCookie($this->cookie, $value, CookieController::getYears(1));
        }

        if (is_array($value)) $query = $query->whereIn($this->field, $value);

        return $query;
    }
}
