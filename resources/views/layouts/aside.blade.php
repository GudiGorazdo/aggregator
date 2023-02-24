<aside id="aside" class="aside modal-window__container" data-modal-target="aside_menu">
    <button class="aside_close modal-window__close"><span class="close-icon"></span></button>
    <div class="filters">
        <form id="filters_form" class="filters_form" action="/" method="GET">
            @csrf
            @foreach(app(\App\Services\FilterService::class)->getFilters() as $filter)
                {{ $filter->render() }}
            @endforeach
            <button id="filters_apply" class="btn btn-success filters_apply" type="submit">Применить</button>
        </form>
        <a href="/" class="btn btn-warning filters_cancel" type="submit">Сбросить все фильтры</a>
    </div>
    <button class="aside_add-shop btn btn-info">добавить организацию</button>
</aside>
