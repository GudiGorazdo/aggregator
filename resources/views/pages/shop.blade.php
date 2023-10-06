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
        <div class="info-left">
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

        <div class="info-right">
            <div class="info-right__wrapper">
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

<section class="testimonials-section">
    <div class="container testimonials__inner">
        <div class="testimonials__heading-box">
            <h2 class="testimonials__heading">Отзывы</h2>
            <x-display-rating
                rating="{{ $shop->average_rating }}"
                disabled={{true}}
                className="testimonials__main-rating"
                classNameCount="testimonials__main-num"
            />
        </div>

        <p class="testimonials__text">
            Все актуальные отзывы об организации можно посмотреть на странице
            компании на соответствующем сервисе
        </p>

        <div class="tabset">
            @foreach($shop->services as $service)
                <input type="radio" name="tabset" id="tab-{{ $service->id }}" />
                <label for="tab-{{ $service->id }}">
                    <img src="{{ asset("resources-assets/svg/$service->logo") }}" alt="{{ $service->name }}" />
                    <span class="btn testimonials__number">{{ $service->pivot->rating_count }} {{ \App\Helpers::getNumEnding((int)$service->rating_count, array('оценка', 'оценки', 'оценок')) }}</span>
                    <x-display-rating
                        rating="{{ $service->pivot->rating }}"
                        disabled={{true}}
                        className="info__rating-table--rating"
                        classNameCount="info__rating-table--rating-num"
                    />
                </label>
            @endforeach

            <div class="tab-panels">
                @foreach($shop->services as $service)
                    <section id="service-responses-{{ $service->id }}" class="tab-panel">
                        <div class="testimonials__tab-header">
                            <div class="testimonials__tab-select">
                                <div class="itc-select" id="googleSelect">
                                    <!-- Кнопка для открытия выпадающего списка -->
                                    <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                        Сначала новые
                                    </button>
                                    <!-- Выпадающий список -->
                                    <div class="itc-select__dropdown">
                                        <ul class="itc-select__options">
                                            <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                Сначала новые
                                            </li>
                                            <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                Сначала старые
                                            </li>
                                            <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                Сначала положительные
                                            </li>
                                            <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                Сначала негативные
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ $service->link }}" class="btn info__link info__link--site testimonials__tab-link">Перейти в карточку организации</a>
                        </div>
                        <div class="testimonials__tab-body-container">
                            @foreach(json_decode($service->pivot->comments) as $comment)
                                {{-- {{ dd($comment->response) }} --}}
                                <div class="testimonials__tab-item">
                                    <div class="testimonials__tab-item--header">
                                        <div class="testimonials__tab-item--photo">
                                            <img src="{{ asset('assets/img/item/customer-photo.jpg') }}" alt="Фото автора отзыва" />
                                        </div>
                                        <div class="testimonials__tab-item--user-info">
                                            <p class="testimonials__tab-item--user-name">{{ $comment->name }}</p>
                                            <p class="testimonials__tab-item--testimonial-date">
                                                {{ $comment->date }}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="testimonials__tab-item--text">
                                        {{ $comment->text }}
                                    </p>
                                    @if($comment->response > [])
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от {{ $comment->response->date }}
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                {{ $comment->response->text }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
        </div>

        <div class="tabset--mobile">
            <ul class="accordion">
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="testimonials-accordion-item-1" class="accordion__checkbox" checked />
                    <label for="testimonials-accordion-item-1" class="accordion__header accordion__header--brands" role="button">
                        <img src="img/item/yandex-logo.svg" alt="Яндекс Карты" />
                        <div class="testimonials-acordion__info-box">
                            <div class="info__rating-table--rating">
                                <p class="info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>

                            <span class="btn testimonials__number">100 оценок</span>
                        </div>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <div class="testimonials__tab-header">
                                    <div class="testimonials__tab-select">
                                        <div class="itc-select" id="googleSelect">
                                            <!-- Кнопка для открытия выпадающего списка -->
                                            <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                                Сначала новые
                                            </button>
                                            <!-- Выпадающий список -->
                                            <div class="itc-select__dropdown">
                                                <ul class="itc-select__options">
                                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                        Сначала новые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                        Сначала старые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                        Сначала положительные
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                        Сначала негативные
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn testimonials__tab-link">Карточка организации</a>
                                </div>
                                <div class="testimonials__tab-body-container">
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="testimonials-accordion-item-2" class="accordion__checkbox" />
                    <label for="testimonials-accordion-item-2" class="accordion__header accordion__header--brands" role="button">
                        <img src="img/item/google-maps-logo.svg" alt="Google Maps" />
                        <div class="testimonials-acordion__info-box">
                            <div class="info__rating-table--rating">
                                <p class="info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>
                            <span class="btn testimonials__number">10000 оценок</span>
                        </div>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <div class="testimonials__tab-header">
                                    <div class="testimonials__tab-select">
                                        <div class="itc-select" id="googleSelect">
                                            <!-- Кнопка для открытия выпадающего списка -->
                                            <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                                Сначала новые
                                            </button>
                                            <!-- Выпадающий список -->
                                            <div class="itc-select__dropdown">
                                                <ul class="itc-select__options">
                                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                        Сначала новые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                        Сначала старые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                        Сначала положительные
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                        Сначала негативные
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn testimonials__tab-link">Карточка организации</a>
                                </div>
                                <div class="testimonials__tab-body-container">
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="testimonials-accordion-item-4" class="accordion__checkbox" />
                    <label for="testimonials-accordion-item-4" class="accordion__header accordion__header--brands" role="button">
                        <img src="img/item/2gis-logo.svg" alt="2gis" />
                        <div class="testimonials-acordion__info-box">
                            <div class="info__rating-table--rating">
                                <p class="info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>

                            <span class="btn testimonials__number">100</span>
                        </div>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <div class="testimonials__tab-header">
                                    <div class="testimonials__tab-select">
                                        <div class="itc-select" id="googleSelect">
                                            <!-- Кнопка для открытия выпадающего списка -->
                                            <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                                Сначала новые
                                            </button>
                                            <!-- Выпадающий список -->
                                            <div class="itc-select__dropdown">
                                                <ul class="itc-select__options">
                                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                        Сначала новые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                        Сначала старые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                        Сначала положительные
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                        Сначала негативные
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn testimonials__tab-link">Карточка организации</a>
                                </div>
                                <div class="testimonials__tab-body-container">
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="accordion__item accordion__item--brands">
                    <input type="checkbox" id="testimonials-accordion-item-3" class="accordion__checkbox" />
                    <label for="testimonials-accordion-item-3" class="accordion__header accordion__header--brands" role="button">
                        <img src="img/item/avito-logo.svg" alt="Avito" />
                        <div class="testimonials-acordion__info-box">
                            <div class="info__rating-table--rating">
                                <p class="info__rating-table--rating-num">3.2</p>
                                <select class="star-rating">
                                    <option value="">Выберите рейтинг</option>
                                    <option value="5">Отлично</option>
                                    <option value="4">Очень хорошо</option>
                                    <option value="3">Удовлетворительно</option>
                                    <option value="2">Плохо</option>
                                    <option value="1">Ужасно</option>
                                </select>
                            </div>

                            <span class="btn testimonials__number">100</span>
                        </div>
                    </label>
                    <div class="accordion__body accordion__body--brands">
                        <div class="accordion__body-inner accordion__body-inner--brands">
                            <div class="accordion__body-content accordion__body-content--brands">
                                <div class="testimonials__tab-header">
                                    <div class="testimonials__tab-select">
                                        <div class="itc-select" id="googleSelect">
                                            <!-- Кнопка для открытия выпадающего списка -->
                                            <button type="button" class="itc-select__toggle" name="googleFilter" value="newest" data-select="toggle" data-index="0">
                                                Сначала новые
                                            </button>
                                            <!-- Выпадающий список -->
                                            <div class="itc-select__dropdown">
                                                <ul class="itc-select__options">
                                                    <li class="itc-select__option itc-select__option_selected" data-select="option" data-value="newest" data-index="0">
                                                        Сначала новые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="oldest" data-index="1">
                                                        Сначала старые
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="best" data-index="2">
                                                        Сначала положительные
                                                    </li>
                                                    <li class="itc-select__option" data-select="option" data-value="worst" data-index="3">
                                                        Сначала негативные
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn testimonials__tab-link">Карточка организации</a>
                                </div>
                                <div class="testimonials__tab-body-container">
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="testimonials__tab-item">
                                        <div class="testimonials__tab-item--header">
                                            <div class="testimonials__tab-item--photo">
                                                <img src="img/item/customer-photo.jpg" alt="Фото автора отзыва" />
                                            </div>
                                            <div class="testimonials__tab-item--user-info">
                                                <p class="testimonials__tab-item--user-name">
                                                    User
                                                </p>
                                                <p class="testimonials__tab-item--testimonial-date">
                                                    00.00.000
                                                </p>
                                            </div>
                                        </div>
                                        <p class="testimonials__tab-item--text">
                                            Lorem ipsum dolor sit amet,
                                        </p>
                                        <div class="testimonials__tab-item--reply-box">
                                            <p class="testimonials__tab-item--reply-date">
                                                Ответ от 00.00.000
                                            </p>
                                            <p class="testimonials__tab-item--reply-text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- <a href="#" class="link info__link info__link--site"
    >Перейти в карточку организации</a
  > -->
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


