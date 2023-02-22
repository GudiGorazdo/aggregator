<aside id="aside" class="aside modal-window__container" data-modal-target="aside_menu">
    <div class="aside_logo"><img src="https://picsum.photos/id/{{ rand(1, 250) }}/125/75" alt="LOGO"></div>
    <div class="aside-filters">
        <form id="filters_form" class="aside-filters_form" action="/" method="GET">
            @csrf
            @foreach(app(\App\Services\FilterService::class)->getFilters() as $filter)
                {{ $filter->render() }}
            @endforeach
            <button id="filters_apply" class="btn btn-success aside-filters_apply" type="submit">Применить</button>
        </form>
        <a href="/" class="btn btn-warning aside-filters_cancel" type="submit">Сбросить все фильтры</a>
    </div>
    <button class="aside_add-shop btn btn-info">добавить организацию</button>
</aside>
