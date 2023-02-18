<button class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></button>
<aside class="aside">
    <button class="aside_close">Закрыть</button>
    <div class="aside_logo"><img src="https://picsum.photos/id/{{ rand(1, 250) }}/100/100" alt="LOGO"></div>
    <button class="aside_add-shop btn btn-primary">добавить организацию</button>
    <div class="aside-city" id="aside_city"></div>
    <div class="aside-filters">
        <form id="filters_form" class="aside-filters_form" action="/" method="GET">
            @csrf
            @include('layouts.aside.filter-category')
            <input id="filter_city" type="text" hidden vlue="" name="city">
            <div class="aside-filters_rating">
                <div class="d-flex flex-row">
                    <div class="ratings mr-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <span></span>
                </div>
            </div>
            <x-accordion className="aside-filters-area" id="filter_area">
                <x-accordion-item
                    id="filter_area_inner"
                    className="aside-filters-area_item"
                    buttonId="ilter_area_button"
                    collapse="coolapse_filter_area_inner"
                    title="Район"
                    bodyId="filter_area_body"
                    disabled="{{ true }}"
                ></x-accordion-item>
            </x-accordion>
            <x-accordion className="aside-filters-subway" id="filter_subway">
                <x-accordion-item
                    id="filter_subway_inner"
                    className="aside-filters-subway_item"
                    buttonId="ilter_subway_button"
                    collapse="coolapse_filter_subway_inner"
                    bodyId="filter_subway_body"
                    title="Метро"
                    disabled="{{ true }}"
                ></x-accordion-item>
            </x-accordion>
            <x-checkbox
                id="work_now"
                name="work_now"
                value="on"
                line="{{ true }}"
                active="{{ $requestData['work_now'] ?? false }}"
            >
                Работает сейчас
            </x-checkbox>
            <x-checkbox
                id="convenience_shop"
                name="convenience_shop"
                value="on"
                line="{{ true }}"
                active="{{ $requestData['convenience_shop'] ?? false }}"
            >
                Круглосуточно
            </x-checkbox>
            <x-checkbox
                id="is_pawnshop"
                name="is_pawnshop"
                value="on"
                line="{{ true }}"
                active="{{ $requestData['is_pawnshop'] ?? false }}"
            >
                Ломбард
            </x-checkbox>
            <x-checkbox
                id="appraisal_online "
                name="appraisal_online "
                value="on"
                line="{{ true }}"
                active="{{ $requestData['appraisal_online'] ?? false }}"
            >
                Онлайн оценка
            </x-checkbox>

            <button id="filters_apply" class="btn btn-primary" type="submit">Применить</button>
        </form>
        <a href="/" class="btn btn-primary" type="submit">Сбросить все фильтры</a>
    </div>
</aside>
