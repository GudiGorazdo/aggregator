@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
@endsection

@php
    $f = [];
    for($i = 0; $i < 4; $i++) {
        $f[] = rand(10, 100);
    }
    $i = 0;

@endphp

@section('content')
    <section class="shop container">
        <input id="shop_coord" type="hidden" value="{{ $shop->coord }}">
        <div class="preview wrapper d-flex align-items-center">
            <ul class="preview d-flex">
                @for($a = 0; $a < count($f); $a++)
                    @if(isset($photos[$a]))
                        <li class="preview_item">
                            <button class="preview_button" data-modal-path="photos_window" data-preview="{{ $a }}">
                                <img class="preview_img" src="{{ $photos[$a] . '/id/' . $f[$a] }}/150/150" loading="lazy" alt="фото компании {{ $shop->name }}">
                            </button>
                        </li>
                    @endif
                @endfor
            </ul>

            <button class="previw_count" data-modal-path="photos_window"  data-preview="0">Все фото</button>
        </div>
        <div class="shop-header d-flex">
            <img class="shop-header_logo" src="{{ $shop->logo . 'id/' . rand(1, 500) }}/100/100"  alt="лого компании {{ $shop->name }}">
            <h2 class="shop-header_title">Комиссионный магазин "{{ $shop->name }}"</h2>
        </div>
        <div class="shop-open"><h4 class="shop-open_title">{{ $timeBeforeClose }}</h4></div>
        <div class="shop-rating">
            <div class="shop-rating_average">
                <p class="shop-rating_label">Общий рейтинг</p>
                <x-star-rating-display rating="{{ +$shop->average_rating }}"/>
                <span>{{ +$shop->average_rating }}</span>
            </div>
            <ul class="shop-rating_list">
                @foreach($shop->services as $service)
                    <li class="shop-rating_item">
                        <p class="shop-rating_service">{{ $service->name }}</p>
                        <x-star-rating-display rating="{{ +$service->pivot->rating }}"/>
                    </li>
                @endforeach
            </ul>
        </div>
        <x-socials-list
            classNameList="shop-rating-socials"
            classNameItem="shop-rating-socials_item"
            tg="{{ $shop->telegram }}"
            whatsapp="{{ $shop->whatsapp }}"
            phone="{{ $shop->phone }}"
        />
        <div class="shop-contacts">
            <h5 class="shop_subtitle">телефон:</h5>
            <ul class="shop-contacts_list">
                @foreach(json_decode($shop->additional_phones) as $phone)
                    <li class="shop-contacts_item"><a class="shop-list_link" href="tel:{{ $phone }}">{{ $phone }}</a></li>
                @endforeach
            </ul>
            <h5 class="shop_subtitle">вебсайт</h5>
            <ul class="shop-contacts_list">
                @foreach(json_decode($shop->web) as $web)
                    <li class="shop-contacts_item"><a class="shop-list_link" href="{{ $web }}">{{ $web }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="shop-working-mode">
            <h5 class="shop_subtitle">режим работы</h5>
            <table class="shop-working-mode_list">
                @foreach($workingMode as $day)
                    <tr>
                        <td>{{ $day['day'] }}</td>
                        @if (!$day['is_open'])
                            <td>Выходной</td>
                        @else
                            <td>с {{ $day['open'] ?? '-'  }} до {{ $day['close'] ?? '-' }}</td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
            <div class="shop-location">
                <h5 class="shop_subtitle">адрес:</h5>
                <div id="shops-map" class="shop-location_map"></div>
            </div>
            <div class="shop-description">{{ $shop->description }}</div>
            <ul class="shop-categories">
                @foreach ($prices as $price)
                    <li class="shop-categories_item">
                        <h4 class="shop-categories_title">{{ $price['name'] }}</h4>
                        @if (!is_null($price['max']))
                            <span class="shop-categories_price">от {{ $price['max'] }}</span>
                        @endif
                        <ul class="shop-categories_sub-categories">
                            @foreach ($price['data'] as $subCategory)
                                <li class="shop-categories_sub-item">
                                    <h4 class="shop-categories_title">{{ $subCategory['name'] }}</h4>
                                    @if (!is_null($price['max']))
                                        <span class="shop-categories_price">от {{ $subCategory['price'] }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
    </section>
@endsection

@section('modal')
    <div id="photos" class="photos modal-window__container" data-modal-target="photos_window">
        <x-close-btn class="photos_close modal-window__close" />
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($photos as $photo)
                    <div class="swiper-slide d-flex justify-contentrcenter">
                        <img class="photos_img" src="{{ $photo . '/id/' . ($i < 4 ? $f[$i] : rand(1, 200)) }}/1000/700" loading="lazy" alt="фото компании {{ $shop->name }}">
                        @php $i++ @endphp
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
@endsection

@section('afterFooter')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript"></script>
    @vite(['resources/js/scripts/pages/shop.js'])
@endsection
