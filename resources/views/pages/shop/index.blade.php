@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
    <link rel="preload" href="{{ asset('assets/images/Loading_black.gif') }}" as="image">
@endsection

@php
    $f = [];
    for ($i = 0; $i < 4; $i++) {
        $f[] = rand(10, 100);
    }
    $i = 0;

@endphp

@section('content')
    <section class="shop container">
        <input id="shop_coord" type="hidden" value="{{ $shop->coord }}">
        <div class="preview d-flex">
            <ul class="preview_list d-flex">
                @for ($a = 0; $a < count($f); $a++)
                    @if (isset($photos[$a]))
                        <li class="preview_item preview_item--{{$a + 1}}">
                            <button  class="preview_button" data-modal-path="photos_window" data-preview="{{ $a }}">
                                <img class="preview_img" src="{{ $photos[$a] . '/id/' . $f[$a] }}/150/150" alt="фото компании {{ $shop->name }}">
                            </button>
                        </li>
                    @endif
                @endfor
            </ul>

            <button id="preview_count" class="preview_count btn site-btn" data-modal-path="photos_window" data-preview="0"></button>
        </div>
        <section class="head d-flex justify-content-center">
            <img class="head_logo" src="{{ $shop->logo . 'id/' . rand(1, 500) }}/100/100" alt="лого компании {{ $shop->name }}">
            <h2 class="head_title">
                Комиссионный магазин 
                <p>"{{ $shop->name }}"</p>
            </h2>
        </section>
        <div class="app-button-wrapper">
            <x-button-primary-link class="app-button" href="#">Отправить заявку на оценку</x-button-primary-link>
        </div>
        <div class="shop-sides">
            <div class="shop-left">
                <div class="work-rating-socials-wrapper">
                    <section class="work">
                        <h6 class="work_title text-center">{{ $timeBeforeClose }}</h6>
                    </section>
                    <div class="rating">
                        <div class="rating_average">
                            <p class="rating_label">Общий рейтинг</p>
                            <x-star-rating-display rating="{{ +$shop->average_rating }}" />
                        </div>
                        <ul class="rating_list">
                            @foreach ($services as $service)
                                <li class="rating_item">
                                    <p class="rating_label">{{ $service['name'] }}</p>
                                    <p class="rating_count rating-count"><i class="fa fa-star rating_star rating_star--gold"></i>{{ +$service['rating'] }}</p>
                                    <a id="anchor_reviews_{{ $service['id'] }}"
                                        class="rating_comments-count"
                                        href="#reviews_item_{{ $service['id'] }}"
                                        {{-- data-bs-toggle="collapse" --}}
                                        {{-- data-bs-taraget="#reviews_service-{{ $service['id'] }}" --}}
                                        {{-- data-anchor-target="reviews_item_{{ $service['id'] }}" --}}
                                        data-anchor-target="reviews_service-{{ $service['id'] }}"
                                    >({{ $service['comments_count_title']}})</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <x-socials-list
                        classNameList="rating-socials"
                        classNameItem="rating-socials_item"
                        tg="{{ $shop->telegram }}"
                        whatsapp="{{ $shop->whatsapp }}"
                        phone="{{ $shop->phone }}"
                    />
                </div>
                <section id="description_desktop" class="description description--desktop">
                    <h3 class="shop_subtitle">Описание</h3>
                    <p class="description_text description_text--desktop">{{ $shop->description }}</p>
                </section>
                @include('pages.shop.categories', ['prices' => $prices, 'mod' => 'desktop'])
            </div>
            <div class="shop-right">
                <div class="contacts-working-mode-wrapper">
                    <section class="contacts">
                        <h4 class="shop_subtitle">Телефон:</h4>
                        <ul class="contacts_list">
                            <li class="contacts_item">
                                <a class="contacts_link" href="tel:{{ $shop->phone }}">{{ $shop->phone }}</a>
                            </li>
                            @foreach ($additionalPhones as $phone)
                                <li class="contacts_item">
                                    <a class="contacts_link" href="tel:{{ $phone }}">{{ $phone }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <h4 class="shop_subtitle">Вебсайт:</h4>
                        <ul class="contacts_list">
                            @foreach (json_decode($shop->web) as $web)
                                <li class="contacts_item">
                                    <a class="contacts_link" href="https://{{ $web }}">{{ $web }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                    <section class="working-mode">
                        <h4 class="shop_subtitle">Режим работы:</h4>
                        <table class="working-mode_list">
                            @foreach ($workingMode as $day)
                                <tr>
                                    <th>{{ $day['day'] }}</th>
                                    @if (!$day['is_open'])
                                        <td>выходной</td>
                                    @else
                                        <td>
                                            {{ $day['open'] > '' ? 'с ' . $day['open'] . ' ' : 'с 00:00 ' }}
                                            {{ $day['close'] > '' ? 'до ' . $day['close'] : 'до 00:00' }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </section>
                </div>
                <section class="location">
                    <h4 class="shop_subtitle">Адрес:</h4>
                    <address class="location_address">{{ $shop->address }}</address>
                    <div id="shop-map" class="location_map"></div>
                </section>
            </div>
        </div>
        <section id="description_mobile" class="description description--mobile">
            <h4 class="shop_subtitle">Описание</h4>
            <div id="description_wrapper" class="description_wrapper close">
                <p id="description_text" class="description_text description_text--mobile">{{ $shop->description }}</p>
            </div>
            <div id="description_ellipsis" class="ellipsis">...</div>
            <button id="description_more" class="description_more btn-link">Далее</button>
        </section>

        <div class="categories-reviews-wrapper">
            @include('pages.shop.categories', ['prices' => $prices, 'mod' => 'mobile'])
            @include('pages.shop.comments-list', ['services' => $services])
        </div>
        @include('layouts.similar', ['similar' => $similar])
    </section>
@endsection

@section('modal')
    <div id="photos" class="photos modal-window__container" data-modal-target="photos_window">
        <x-close-btn id="exit_fullscreen_photos" class="photos_close modal-window__close" />
        <div class="swiper photos-swiper">
            <div class="swiper-wrapper">
                @foreach ($photos as $photo)
                    <div class="swiper-slide d-flex justify-contentrcenter">
                        <div class="loader">
                            <img src="{{ asset('assets/images/Loading_black.gif') }}" loading="lazy" alt="loader">
                        </div>
                        <img class="photos_img"
                            src="{{ $photo . '/id/' . ($i < 4 ? $f[$i] : rand(1, 200)) }}/1000/700"
                            loading="lazy"
                            alt="фото компании {{ $shop->name }}"
                        >

                        @php $i++ @endphp
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev photos-swiper-button-prev"></div>
            <div class="swiper-button-next photos-swiper-button-next"></div>
        </div>
        <div class="swiper-pagination photos-swiper-pagination"></div>
    </div>
@endsection

@section('afterFooter')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript"></script>
    @vite(['resources/js/scripts/pages/shop.js'])
@endsection
