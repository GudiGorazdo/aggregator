<aside class="filter__aside">
    <div class="filter__aside--collapsed">
        <button class="btn filter__aside-btn">
            <x-icon-filter-icon />
        </button>
        <button class="btn filter__aside-btn">
            <x-icon-places-icon />
            <span class="filter__aside-btn--span">5</span>
        </button>
        <button class="btn filter__aside-btn">
            <x-icon-location-icon />
            <span class="filter__aside-btn--span">5</span>
        </button>
        <button class="btn filter__aside-btn">
            <x-icon-metro-icon />
            <span class="filter__aside-btn--span">5</span>
        </button>
        <div class="filter__summ-ratig">
            <x-icon-star-full width="18" height="18" viewBox="0 0 18 18"/>
            <p>3.0</p>
        </div>
        <button class="btn filter__aside-btn"><x-icon-clock-icon /></button>
        <button class="btn filter__aside-btn"><x-icon-calculator-icon /></button>
    </div>

    <div class="filter__aside--expanded">
        <div class="flex-btw">
            <button class="btn filter__collapse-btn">
                <span> Фильтр </span>
            </button>

            <button class="btn filter__aside-clear-btn">
                <x-icon-trash />
                <span>Очистить</span>
            </button>
        </div>

        <div class="mb-3">
            <p class="filter__aside-label mt-3 mb-15">Категории</p>
            <div class="itc-select" id="filter-select-1">
                <button type="button" class="itc-select__toggle categories-select categories-select-right" name="city" value="spb" data-select="toggle" data-index="0">
                    Категории
                </button>
            </div>

            {{ app(\App\Services\FilterService::class)->getFilterByName('location')->render(null, false) }}
        </div>

        {{ app(\App\Services\FilterService::class)->getFilterByName('rating')->render(null, false) }}
        {{ app(\App\Services\FilterService::class)->getFilterByName('options')->render(null, false) }}
    </div>
</aside>
{{ app(\App\Services\FilterService::class)->getFilterByName('category')->render(null, false) }}


