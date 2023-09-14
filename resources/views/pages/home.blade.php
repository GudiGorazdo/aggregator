@extends('layouts.master')

@section('title')
<title>Agregator</title>
@endsection

@section('links_scripts')
<link rel="preconnect" href="//api-maps.yandex.ru">
<link rel="dns-prefetch" href="//api-maps.yandex.ru">
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=latlong" type="text/javascript" async=""></script>
@endsection

@section('styles')
    @vite([ 'resources/js/plugins/star-rating/star-rating.min.css' ])
@endsection

@section('content')
@include('layouts.hero', ['title' => $title])
@include('layouts.filter', ['shops' => $shops])
<section class="categories-section">
    <div class="container">
        <h2 class="categories__title">Похожие категории</h2>

        <div class="categories__inner">
            <div>
                <div class="categories__items">
                    <a href="#">
                        <img src="img/categories/categories-page/1.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/2.svg" alt="" />
                        <h3>Фотоаппараты</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/3.svg" alt="" />
                        <h3>Ноутбуки</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/4.svg" alt="" />
                        <h3>Телевизоры</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/5.svg" alt="" />
                        <h3>Персональные ПК</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/2.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/1.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/1.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                    <a href="#">
                        <img src="img/categories/categories-page/1.svg" alt="" />
                        <h3>Телефоны</h3>
                    </a>
                </div>

                <button class="btn categories__item-btn categories__expand" data-button="moreactive">
                    Показать все
                </button>
            </div>

            <div class="categories__regions">
                <div class="categories__regions-list">
                    <a href="#">Центральный район</a>
                    <a href="#">Ленинский район</a>
                    <a href="#">Свердловский район</a>
                    <a href="#">Одинцвоский район</a>
                    <a href="#">Южный район</a>
                    <a href="#">Ленинский район</a>
                    <a href="#">Ленинский район</a>
                    <a href="#">Свердловский район</a>
                    <a href="#">Одинцвоский район</a>
                    <a href="#">Южный район</a>
                </div>
                <!-- <a href="#">Скупка в других районах</a> -->
                <button class="btn categories__item-btn regions__expand" data-button="district">
                    Показать все
                </button>
            </div>
        </div>
    </div>
</section>

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

@section('modal')
@endsection

@section('afterFooter')
{{-- <script defer src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript" crossorigin="anonymous"></script> --}}
{{-- <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script> --}}
{{-- @vite([ 'resources/js/scripts/pages/home.js' ]) --}}
@vite([ 'resources/js/scripts/locationFilter.js' ])
{{-- @vite([ 'resources/js/scripts/starRating.js' ]) --}}
@endsection


