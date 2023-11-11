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
    @vite(['resources/css/pages/home.scss'])
@endsection

@section('content')
    @include('layouts.hero')
    @include('layouts.filter', ['shops' => $shops])
    @include('layouts.similar-categories-and-location', ['cityID' => $cityID])

    <section class="mobile-nav-section">
        <div class="mobile-nav-section__box">
            <button class="btn mobile-nav-section__toggle-btn mobile-nav-section__toggle-btn--filter filter-toggle-btn">
                <x-icon-arrow-square-up />
                <span>Фильтр</span>
            </button>
            <button id="mobile_map" class="btn mobile-nav-section__toggle-btn mobile-nav-section__toggle-btn--map">
                <x-icon-places-icon class="mobile-nav-section__icon mobile-nav-section__icon--places" />
                <x-icon-map-icon class="mobile-nav-section__icon mobile-nav-section__icon--map" />
            </button>
        </div>

        <a class="btn btn--primary hero__btn" href="#">Отправить заявку всем</a>
    </section>
@endsection

@section('modal')
@endsection

@section('afterFooter')
    <script defer src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU"
        type="text/javascript" crossorigin="anonymous"></script>
    <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    {{-- @vite([ 'resources/js/scripts/pages/home.js' ]) --}}
    {{-- @vite([ 'resources/js/bundle.js' ]) --}}
    @vite(['resources/js/scripts/pages/home.js'])
    {{-- @vite([ 'resources/js/scripts/yandexMapWorker.js' ]) --}}
    {{-- @vite([ 'resources/js/scripts/locationFilter.js' ]) --}}
    {{-- @vite([ 'resources/js/scripts/starRating.js' ]) --}}
@endsection
