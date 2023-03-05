@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
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
                                    <p class="rating_comments-count">({{ $service['comments_count_title']}})</p>
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
                    <h5 class="shop_subtitle">Описание</h5>
                    <p class="description_text description_text--desktop">{{ $shop->description }}</p>
                </section>
            </div>
            <div class="shop-right">
                <div class="contacts-working-mode-wrapper">
                    <section class="contacts">
                        <h5 class="shop_subtitle">Телефон:</h5>
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
                        <h5 class="shop_subtitle">Вебсайт:</h5>
                        <ul class="contacts_list">
                            @foreach (json_decode($shop->web) as $web)
                                <li class="contacts_item">
                                    <a class="contacts_link" href="{{ $web }}">{{ $web }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                    <section class="working-mode">
                        <h5 class="shop_subtitle">Режим работы:</h5>
                        <table class="working-mode_list">
                            @foreach ($workingMode as $day)
                                <tr>
                                    <th>{{ $day['day'] }}</th>
                                    @if (!$day['is_open'])
                                        <td>выходной</td>
                                    @else
                                        <td>{{ $day['open'] > '' ? 'с ' . $day['open'] . ' ' : '' }}{{ $day['close'] > '' ? 'до ' . $day['close'] : '' }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </section>
                </div>
                <section class="location">
                    <h5 class="shop_subtitle">Адрес:</h5>
                    <address class="location_address">{{ $shop->address }}</address>
                    <div id="shop-map" class="location_map"></div>
                </section>
            </div>
        </div>
        <section id="description_mobile" class="description description--mobile">
            <h5 class="shop_subtitle">Описание</h5>
            <div id="description_wrapper" class="description_wrapper close">
                <p id="description_text" class="description_text description_text--mobile">{{ $shop->description }}</p>
            </div>
            <div id="description_ellipsis" class="ellipsis">...</div>
            <button id="description_more" class="description_more btn-link">Далее</button>
        </section>
        <section class="categories">
            <h3 class="title text-center">Можно продать:</h3>
            <ul class="categories_list">
                @foreach ($prices as $price)
                    <li class="categories_item">
                        <x-collapse
                            classNameButton="categories_collapse collapsed"
                            target="category_{{ $price['category_id'] }}"
                            controls="category_{{ $price['category_id'] }}"
                        >
                            <x-slot name="title">
                                <div class="categories_head">
                                    <p class="categories_title">{{ $price['name'] }}</p>
                                    @if (!is_null($price['max']))
                                        <span class="categories_price">до {{ number_format($price['max'] , 0, '', ' ')}}₽</span>
                                    @endif
                                </div>
                            </x-slot>

                            <ul class="categories_sublist">
                                @foreach ($price['data'] as $subCategory)
                                    <li class="categories_subitem">
                                        <p class="categories_title">{{ $subCategory['name'] }}</p>
                                        @if (!is_null($subCategory['price']))
                                            <span class="categories_price">до  {{ number_format($subCategory['price'] , 0, '', ' ')}}₽</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </x-collapse>
                    </li>
                @endforeach
            </ul>
        </section>
        <section class="reviews">
            <h3 class="title text-center">Отзывы</h3>
            <x-accordion className="reviews_accordion" id="reviews">
                @foreach ($services as $service)
                    <x-accordion-item
                        id="reviews_inner"
                        className="reviews_item"
                        bodyClassName="reviews_body"
                        collapse="reviews_service-{{ $service['id'] }}"

                    >
                        <x-slot name="title">
                            <span class="reviews_service-name">{{ $service['name'] }}</span>
                            <p class="reviews_rating-count rating-count reviews_rating-count--mobile">
                                <i class="fa fa-star rating_star rating_star--gold"></i>
                                {{ +$service['rating'] }}
                            </p>
                            <div class="reviews_rating-count reviews_rating-count--desktop">
                                <x-star-rating-display rating="{{ +$service['rating'] }}" />
                            </div>
                            <span class="reviews_count">({{ $service['comments_count_title'] }})</span>
                        </x-slot>
                        <p class="reviews_subtitle text-center">
                            Все актуальные отзывы можно просмотреть в
                            <a class="reviews_link" href="{{ $service['link']}}">карточке организации</a>
                        </p>
                        <ul class="reviews_list">
                            @foreach ($service['comments'] as $comment)
                                <li class="reviews_comment">
                                    <div class="d-flex">
                                        <p class="reviews_name">{{ $comment->name }}</p>
                                        <p class="reviews_date">{{ $comment->date }}</p>
                                    </div>
                                    <p class="reviews_text">{{ $comment->text }}</p>
                                    @if (!empty($comment->response))
                                        <x-collapse
                                            classNameButton="reviews_response collapsed btn-link"
                                            target="comment_{{ $comment->date }}_{{ $comment->name }}"
                                            controls="comment_{{ $comment->date }}_{{ $comment->name }}"
                                            title="({{ count($comment->response) }})"
                                        >
                                            <ul class="reviews_sublist">
                                                @foreach ($comment->response as $response)
                                                    <li class="reviews_subcomment">
                                                        <div class="d-flex">
                                                            <p class="reviews_name">{{ $comment->name }}</p>
                                                            <p class="reviews_date">{{ $comment->date }}</p>
                                                        </div>
                                                        <p class="reviews_text">{{ $comment->text }}</p>
                                                        <span class="shadow-line"></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            {{-- <button
                                                class="btn-link"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#comment_{{ $comment->date }}_{{ $comment->name }}_collapse"
                                                aria-controls="comment_{{ $comment->date }}_{{ $comment->name }}_collapse"
                                                aria-expanded="false"
                                            >Скрыть ответы</button> --}}
                                        </x-collapse>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </x-accordion-item>
                @endforeach
            </x-accordion>
        </section>
    </section>
@endsection

@section('modal')
    <div id="photos" class="photos modal-window__container" data-modal-target="photos_window">
        <x-close-btn class="photos_close modal-window__close" />
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($photos as $photo)
                    <div class="swiper-slide d-flex justify-contentrcenter">
                        <div class="loader"></div>
                        <img
                            class="photos_img"
                            src="{{ $photo . '/id/' . ($i < 4 ? $f[$i] : rand(1, 200)) }}/1000/700"
                            loading="lazy"
                            alt="фото компании {{ $shop->name }}"
                        >

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
