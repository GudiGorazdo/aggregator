<aside id="aside" class="aside modal-window__container" data-modal-target="aside_menu">
    <x-close-btn class="nav-menu_close modal-window__close" />
    <div class="filters">
        {{-- <div class="aside-city mb-3">
            {{ app(\App\Services\FilterService::class)->getFilterByName('CityFilterAside')->render(null, false) }}
        </div> --}}
        <form id="filters_form" class="filters_form" action="/" method="GET">
            @csrf
            @foreach(app(\App\Services\FilterService::class)->getFilters() as $filter)
                {{ $filter->render() }}
            @endforeach
            <input id="filter_city" type="text" value="" name=city hidden>
            <button id="filters_apply" class="btn btn-success filters_apply" type="submit">Применить</button>
        </form>
        <a href="/" class="btn site-btn filters_cancel" type="submit">Сбросить все фильтры</a>
    </div>
    <button class="aside_add-shop btn site-btn">добавить организацию</button>
</aside>
