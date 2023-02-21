<button class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></button>
<aside class="aside">
    <button class="aside_close">Закрыть</button>
    <div class="aside_logo"><img src="https://picsum.photos/id/{{ rand(1, 250) }}/100/100" alt="LOGO"></div>
    <button class="aside_add-shop btn btn-primary">добавить организацию</button>
    <div class="aside-filters">
        <form id="filters_form" class="aside-filters_form" action="/" method="GET">
            @csrf
            @foreach(app(\App\Services\FilterService::class)->getFilters() as $filter)
                {{ $filter->render() }}
            @endforeach
            <button id="filters_apply" class="btn btn-primary" type="submit">Применить</button>
        </form>
        <a href="/" class="btn btn-primary" type="submit">Сбросить все фильтры</a>
    </div>
</aside>
