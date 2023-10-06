@extends('layouts.master')

@section('title')
<title>Agregator</title>
@endsection

@section('styles')
<link rel="preload" href="{{ asset('assets/images/Loading_black.gif') }}" as="image">
@vite([ 'resources/css/pages/shop.scss' ])
@endsection

@section('content')
<input id="shop_coord" type="hidden" name="shop_coord" value={{ $shop->coord }} data-shop-path={{ $shop->id }}>
<section class="carousel-section">
    <x-carousel
        className='preview carousel'
        classNameSlide="preview__slide"
        classNameImage="preview__img"
        :items="json_decode($shop->photos)"
        alt="фото компании {{ $shop->name }}"
    >
    </x-carousel>
    <div class="btn previous"><x-icon-slider-arrow-left /></div>
    <div class="btn forwards"><x-icon-slider-arrow-right /></div>
</section>

<section class="heading">
    <div class="container">
        <div class="heading__inner">
            <h1 class="heading__title">
                {{ $shop->name }}
            </h1>
            <a href="#" class="btn btn--primary heading__btn">Заявка на оценку</a>
        </div>
    </div>

    {{-- <a href="#" class="btn heading__back-btn"><x-icon-slider-arrow-left /></a> --}}
</section>

<section class="info">
    <div class="info__wrapper container">
        <div class="info__left">
            <div class="info-heading">
                <x-icon-location/>
                <span class="info-heading__title">{{ $shop->address }}</span>
            </div>

            <div class="info-links">
                @if (!is_null($web))
                    <a href="{{ $web[0] }}" class="info-links__link info-links__link--site">{{ $web[0] }}</a>
                @endif
                @if (!is_null($shop->vk))
                    <a href="vk.com/{{ $shop->vk[0] }}" class="info-links__link info-links__link--vk">vk.com/{{ $shop->vk }}</a>
                @endif
            </div>

            <div class="info-rating">
                <h2 class="info-title mb-12">Общий рейтинг</h2>
                <x-display-rating rating="{{ $shop->average_rating }}" disabled={{true}} shopID="{{ $shop->id }}"/>
                <table class="info-rating__table">
                    @foreach($shop->services as $service)
                    <tr>
                        <th class="info-rating__logo">
                            <img src="{{ asset("resources-assets/svg/$service->logo") }}" alt="{{ $service->name }}" />
                        </th>
                        <td>
                            <x-display-rating
                                rating="{{ $service->pivot->rating }}"
                                disabled={{true}}
                                classNameCount="info-rating__count"
                                className="info-rating__stars"
                            />
                        </td>
                    </tr>
                @endforeach
                </table>
            </div>

            <div class="info-description">
                <h2 class="info-title mb-15">Описание</h2>
                <p class="info-description__text" id="text-slice">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <button class="btn info-description__btn">
                    Показать все
                </button>
            </div>
        </div>

        <div class="info__right">
            <div class="info__right-wrapper">
                <div class="info-contacts">
                    <div class="info-heading">
                        <x-icon-contacts/>
                        <span class="info-heading__title">Контакты</span>
                    </div>

                    <div class="info-contacts__wrapper">
                        <div class="info-contacts__phones">
                            <a href="tel:{{ $shop->phone }}" class="info-contacts__phone">{{ $shop->phone }}</a>
                            @if (!is_null($additionalPhones))
                                @foreach($additionalPhones as $phone)
                                    <a href="tel:{{ $phone }}" class="info-contacts__phone">{{ $phone }}</a>
                                @endforeach
                            @endif
                        </div>

                        <div class="info-contacts__socials">
                            @if(!is_null($shop->whatsapp))
                                <a href="whatsapp:{{ $shop->whatsapp }}" class="btn info-contacts__social-link"><x-icon-whatsapp-icon /></a>
                            @endif
                            @if(!is_null($shop->telegram))
                                <a href="telegram:{{ $shop->telegram }}"
                                    class="btn info-contacts__social-link"
                                ><x-icon-telegram-icon width="25" height="24" viewBox="2 -0 24 24"/></a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info__hours">
                    <p class="info__countdown">
                        {{ \App\Services\TitleService::getTimeBeforeClose($shop) }}
                    </p>

                    @include('layouts.hours', ['days' => $workingMode])
                </div>
            </div>

            <div class="info-map">
                <div id='map'></div>
                <div class="info-map__overlay">
                    <button href="#" class="btn btn--primary info-map__btn">
                        <x-icon-add-icon />
                        <span>Построить маршрут</span>
                    </button>
                    <button href="#" class="btn btn--grey info-map__btn">
                        <x-icon-location-icon />
                        <span>Санкт-Петербург, ул. Ленина, д. 100</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sell">
    <div class="sell__container container-wide">
        <h2 class="sell__title">Можно продать</h2>
        <ul class="sell-list">
            @foreach($categories as $category)
                <li>
                    <x-accordion id="sell-item-{{ $category->id }}" modification="sell" >
                        <x-slot name="title">
                            <span class="sell-list__title">{{ $category->name }}</span>
                            @if($prices[$category->id]['max'])
                                <span class="sell-list__range">до {{ $prices[$category->id]['max'] }} руб.</span>
                            @endif
                        </x-slot>
                        @include('layouts.brands-list', [
                            'subCategories' => $category->subCategories,
                            'categoryID' => $category->id,
                            'prices' => $prices,
                            'modification' => 'sell',
                            'classNameUl' => 'open',
                            'attributes' => 'data-path=sell-item-' . $category->id,
                        ])
                            <div class="sell-list__breadcrumbs">
                                <button class="btn sell-list__back" data-target-breadcrumbs="sell-item-{{ $category->id }}">{{ $category->name }} ({{ count($category->subCategories) }}</button>
                            </div>
                        @php
                            $rarr = collect([]);
                            for($i=1; $i<=20; $i++) {
                                $rarr->push((object)['name' => "Пункт_$i"]);
                            }
                        @endphp
                        @include('layouts.brands-list', [
                            'subCategories' => $rarr,
                            'modification' => 'point',
                            'attributes' => 'data-target=sell-item-' . $category->id
                        ])
                    </x-accordion>
                </li>
            @endforeach
        </ul>

        <button class="btn sell__more">Показать все</button>
    </div>
</section>

<section class="testimonials">
    <div class="container testimonials__content">
        <div class="testimonials__left">
            <div class="testimonials__heading">
                <h2 class="testimonials__title">Отзывы</h2>
                <x-display-rating
                        rating="{{ $shop->average_rating }}"
                        disabled={{true}}
                        className="testimonials__average"
                        classNameCount="testimonials__count"
                        />
            </div>

            <p class="testimonials__description">Все актуальные отзывы об организации можно посмотреть на странице компании на соответствующем сервисе</p>

            <div class="testimonials__tabset">
                @foreach($shop->services as $service)
                    <input class="testimonials__checkbox" type="radio" name="tabset" id="tab-{{ $service->id }}" {{ $service->id === 1 ? 'checked' : '' }} autocomplete="off"/>
                    <label class="testimonials__label" for="tab-{{ $service->id }}" data-tab-path="tab-testimonials-{{ $service->id }}" data-tab-group="tab-testimonials">
                        <img src="{{ asset("resources-assets/svg/$service->logo") }}" alt="{{ $service->name }}" />
                        <span class="btn testimonials__number">{{ $service->pivot->rating_count }} {{ \App\Helpers::getNumEnding((int)$service->rating_count, array('оценка', 'оценки', 'оценок')) }}</span>
                        <x-display-rating
                                rating="{{ $service->pivot->rating }}"
                                disabled={{true}}
                                className="tabset-rating"
                                classNameCount="tabset-rating__count"
                                />
                    </label>
                @endforeach
            </div>
        </div>
        <div class="testimonials__panels">
            @foreach($shop->services as $service)
                <div class="{{ $service->id == 1 ? 'open' : '' }}" data-tab-target="tab-testimonials-{{ $service->id }}" data-tab-group="tab-testimonials">
                    @include('layouts.comments-list', ['service' => $service])
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('layouts.similar-companies', [ 'similars' => $similars ])
@include('layouts.similar-categories', ['cityID' => $shop->city_id])

<section class="mobile-nav-section">
    <div class="mobile-nav-section__box">
        <button class="btn mobile-filter-toggle-btn">
            <img src="img/icon/arrow-square-up.svg" alt="Открыть фильтр" />
            <span>Фильтр</span>
        </button>
        <button class="btn mobile-toggle-btn mobile-toggle-btn--places">
            <img src="img/icon/places-icon.svg" alt="Открыть список мест" />
        </button>
        <button class="btn mobile-toggle-btn mobile-toggle-btn--map">
            <img src="img/icon/map-icon.svg" alt="Открыть карту" />
        </button>
    </div>

    <a class="btn hero-section-btn" href="#">Отправить заявку всем</a>
</section>
@endsection

@section('afterFooter')
<script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript"></script>
@vite(['resources/js/scripts/pages/shop.js'])
@endsection


