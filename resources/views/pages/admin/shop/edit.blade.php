@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
    @vite([ 'resources/scss/admin.scss' ])
@endsection

@section('content')
    <section class="shop container">
        <section class="head d-flex justify-content-center">
            <img class="head_logo" src="{{ $shop->logo . 'id/' . rand(1, 500) }}/100/100" alt="лого компании {{ $shop->name }}">
            <h2 class="head_title">
                Комиссионный магазин 
                <p>"{{ $shop->name }}"</p>
            </h2>
        </section>
        {{--<input id="shop_coord" value="{{ $shop->coord }}">--}}
        <x-input
            classNamesWrapper="mb-3"
            inputId="lat"
            name="lat"
            label="Долгота (Latitude)"
            type="text"
            value="{{ $coord['lat'] }}"
        />
        <x-input
            classNamesWrapper="mb-3"
            inputId="long"
            name="long"
            label="Широта (Longitude)"
            type="text"
            value="{{ $coord['long'] }}"
        />

        <x-accordion className="shop-photos" id="shop_photos">
            <x-accordion-item
                className="shop-photos_inner"
                {{-- bodyClassName="reviews_body" --}}
                {{-- bodyId="reviews_body_{{ $service['id'] }}" --}}
                collapse="shop_photos_inner"
            >
                <x-slot name="title">
                    Все фотографии 
                    {{--{{ dd($photos) }}--}}
                    <span id="shop_photos_count">( {{ count((array)$photos) }} )</span>
                </x-slot>
                <form id="shop_photos_form" class="shop-photos_form" action="#">
                    <input type="hidden" value="{{ $shop->id}}" name="id">
                    <ul id="shop_photos_list" class="shop-photos_list d-flex">
                       @include('pages.admin.shop.photos-list-items', ['photos' => $photos, 'shop' => $shop])
                    </ul>
                </form>
                {{--<x-button-site id="shop_photos_remove"--}}
                    {{--data-modal-path="site-confirm"--}}
                    {{--data-confirm="Удалить выбранные фото?"--}}
                    {{-- data-alert="Этот функционал временно не доступен." --}}
                {{-->Удалить выделенные</x-button-site>--}}
            </x-accordion-item>
        </x-accordion>
        <div class="shop-add-photos-wrapper">
            <form action="{{ route('admin.shop.update', ["shop" => $shop->id]) }}" id="shop_add_photos" class="shop-add-photos dropzone">
                @method('PATCH')
            </form>
        </div>
        <form id="shop-main-form" action="#" data-id="{{ $shop->id}}">
            <button>SUBMIT!!!</button>
        </form>
        <div class="shop-sides">
            <div class="shop-left">
                <div class="work-rating-socials-wrapper">
                    <div class="rating">
                        <div class="rating_average">
                            <p class="rating_label">Общий рейтинг</p>
                            <x-star-rating-display rating="{{ +$shop->average_rating }}" decimal='1'/>
                        </div>
                        <ul class="rating_list">
                            @foreach ($services as $service)
                                <li class="rating_item">
                                    <p class="rating_label">{{ $service['name'] }}</p>
                                    <p class="rating_count rating-count"><i class="fa fa-star rating_star rating_star--gold"></i></p>
                                    <x-input
                                        classNamesWrapper="mb-3"
                                        inputId="sevice_{{ $service['id'] }}"
                                        name="{{ $service['id'] }}"
                                        label=""
                                        type="text"
                                        value="{{ +$service['rating'] }}"
                                    />
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
                        edit="{{ true }}"
                    />
                </div>
                <section id="description_desktop" class="description description--desktop">
                    <h3 class="shop_subtitle">Описание</h3>
                    {{--<p class="description_text description_text--desktop">{{ $shop->description }}</p>--}}
                    <textarea id="descriotion" name="description">{{ $shop->description }}</textarea>
                </section>
                @include('pages.shop.categories', ['prices' => $prices, 'mod' => 'desktop'])
            </div>
            <div class="shop-right">
                <div class="contacts-working-mode-wrapper">
                    <section class="contacts">
                        <h4 class="shop_subtitle">Телефон:</h4>
                        <ul class="contacts_list">
                            <li class="contacts_item">
                                {{--<a class="contacts_link" href="tel:{{ $shop->phone }}">{{ $shop->phone }}</a>--}}
                                Основной
                                <x-input
                                    classNamesWrapper="mb-3"
                                    inputId="phone_main"
                                    name="phone_main"
                                    label=""
                                    type="text"
                                    value="{{ $shop->phone }}"
                                />
                            </li>
                            @foreach ($additionalPhones as $index => $phone)
                                <li class="contacts_item">
                                    {{--<a class="contacts_link" href="tel:{{ $phone }}">{{ $phone }}</a>--}}
                                    <x-input
                                        classNamesWrapper="mb-3"
                                        inputId="phone_additional_{{ $index }}"
                                        name="phone_additional[]"
                                        label=""
                                        type="text"
                                        value="{{ $phone }}"
                                    />
                                </li>
                            @endforeach
                        </ul>
                        <h4 class="shop_subtitle">Вебсайт:</h4>
                        <ul class="contacts_list">
                            @foreach (json_decode($shop->web) as $index => $web)
                                <li class="contacts_item">
                                    {{--<a class="contacts_link" href="https://{{ $web }}">{{ $web }}</a>--}}
                                    <x-input
                                        classNamesWrapper="mb-3"
                                        inputId="web_{{ $index }}"
                                        name="web[]"
                                        label=""
                                        type="text"
                                        value="{{ $web }}"
                                    />
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
            @include('pages.shop.reviews-list', ['services' => $services])
        </div>
    </section>
@endsection

@section('modal')
    {{-- <div id="photos" class="photos modal-window__container" data-modal-target="photos_window">
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
    </div> --}}
@endsection

@section('afterFooter')
    @vite(['resources/js/scripts/admin/edit.js'])
@endsection
