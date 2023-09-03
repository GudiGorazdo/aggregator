<header class="header">
    <div class="container--wide">
        <div class="header__top flex-btw">
            <button class="btn header__menu-btn">
                <x-icon-burger />
            </button>
            <a class="header__logo ml-4" href="/">
                <img src="{{ asset('assets/img/logo.webp') }}" alt="RentSell logo" />
                <img class="header__top-logo--text" src="{{ asset('assets/img/textlogo.png') }}" alt="RentSell logo" />
            </a>
            <p class="header__top-text mr-auto">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </p>

            <div class="itc-select mr-15" id="citySelect">
                @if (Illuminate\Support\Facades\Request::path() == '/')
                <div class="header-city">
                    {{ app(\App\Services\FilterService::class)->getFilterByName('CityFilterHeader')->render(null, false) }}
                    <div id="city_confirm_popup" class="header-city-popup hidden">
                        <x-close-btn id="city_popup_close" class="header-city-popup_close" />
                        <p class="header-city-popup_label">Это ваш город?</p>
                        <button id="city_confirm_true" class="btn site-btn header-city-popup_confirm">Подтвердить</button>
                    </div>
                </div>
                @endif
            </div>
            <a class="btn header__top-link" href="#">Добавить организацию</a>
            <button class="btn header__map-btn">
                <x-icon-location-icon />
            </button>
        </div>
        @include('layouts.menu', [
            'categories' => \App\Models\Category::all(),
            'areas' => \App\Models\Area::where('city_id', request()->cookie('LOCATION'))->get(),
        ])
    </div>
</header>


