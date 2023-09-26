@extends('layouts.master')

@section('title')
<title>Agregator</title>
@endsection

@section('links_scripts')
{{-- <link rel="preconnect" href="//api-maps.yandex.ru"> --}}
{{-- <link rel="dns-prefetch" href="//api-maps.yandex.ru"> --}}
{{-- <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&amp;coordorder=latlong" type="text/javascript" async=""></script> --}}
@endsection

@section('styles')
    @vite([ 'resources/css/pages/home.scss' ])
@endsection

@section('content')
<section class="hero container-wide mb-45">
    <div class="hero__content flex-ctr">
        <h1 class="hero__title">{{ $title }}</h1>
        <div class="hero__text-box">
            <p class="hero__text">
                Срочный выкуп ноутбуков, телефонов, планшетов, фотоаппаратов в
                любом состоянии.
            </p>
            <p class="hero__text">
                Срочный выкуп ноутбуков, телефонов, планшетов, фотоаппаратов в
                любом состоянии.
            </p>
            <p class="hero__text">
                Срочный выкуп ноутбуков, телефонов, планшетов, фотоаппаратов в
                любом состоянии.
            </p>
            <button class="btn hero__text-expand-btn"></button>
        </div>
        <a class="btn btn--primary hero__btn" href="#">Отправить заявку всем</a>
    </div>
</section>

@include('layouts.filter', ['shops' => $shops])
@include('layouts.similar-categories', ['cityID' => $cityID])

<section class="mobile-nav-section">
    <div class="mobile-nav-section__box">
        <button class="btn mobile-nav-section__toggle-btn mobile-nav-section__toggle-btn--filter">
            <x-icon-arrow-square-up />
            <span>Фильтр</span>
        </button>
        <button class="btn mobile-nav-section__toggle-btn mobile-nav-section__toggle-btn--places">
            <x-icon-places-icon />
        </button>
        <button class="btn mobile-nav-section__toggle-btn mobile-nav-section__toggle-btn--map">
            <x-icon-map-icon />
        </button>
    </div>

    <a class="btn btn--primary hero__btn" href="#">Отправить заявку всем</a>
</section>
@endsection

@section('modal')
@endsection

@section('afterFooter')
<script defer src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript" crossorigin="anonymous"></script>
<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
{{-- @vite([ 'resources/js/scripts/pages/home.js' ]) --}}
{{-- @vite([ 'resources/js/bundle.js' ]) --}}
@vite([ 'resources/js/scripts/pages/home.js' ])
{{-- @vite([ 'resources/js/scripts/yandexMapWorker.js' ]) --}}
{{-- @vite([ 'resources/js/scripts/locationFilter.js' ]) --}}
{{-- @vite([ 'resources/js/scripts/starRating.js' ]) --}}
@endsection


