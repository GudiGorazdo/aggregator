@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
@endsection

@section('content')
    <section class="container">
        @auth("admin")
            {{ Auth::guard('admin')->check() }}
            <h1>sdkjf;alksdf;aklsjdf;klasjdf;aklj</h1>
        @endauth
        <h2 class="title display-3 text-center mb-3">Скупки ноутбуков в Московском районе</h2>
        <div class="text-center mb-3"><x-link class="more-link">Подробнее ...</x-link></div>
        <div class="filters_buttons-wraper d-flex mb-5">
            <x-button-site
                id="show_filters"
                class="filters_show me-2"
                data-modal-path="aside_menu"
                data-modal-animation="fadeInLeft"
                data-modal-one-button="true"
            >Фильтры</x-button-site>
            <x-button-site id="change-display" class="change-display d-block">Карта</x-button-site>
        </div>

        <div id="shops-map" class="hidden" style="max-width: 100%; height: 400px"></div>
        @include('layouts.shop.shop-list', ['shops' => $shops])

        <h3 class="title display-4 text-center">Похожие категории</h3>
        <div class="similar mb-3">
            <div class="similar_categories">
                <h4 class="">скупка категорий техники:</h4>
                <ul>
                    <li>Скупка телефонов</li>
                    <li>Скупка планшетов</li>
                    <li>Скупка фотоаппаратов</li>
                </ul>
            </div>
            <div class="similar_areas">
                <h4 class="">скупка в других районах:</h4>
                <ul>
                    <li>Скупка в Центральном районе</li>
                    <li>Скупка Ленинском районе</li>
                    <li>Скупка Калининском районе</li>
                </ul>
            </div>
        </div>

        <div class="send-everyone">
            <x-button-primary-link
                id="show-site-alert"
                class="send-everyone_link"
                href="#"
                data-modal-path="site-alert"
                data-modal-one-button="true"
                data-alert="Этот функционал временно не доступен."
            >Отправить заявку всем
            </x-button-link>
        </div>
    </section>
@endsection

@section('afterFooter')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript"></script>
    @vite([ 'resources/js/scripts/pages/home.js' ])
@endsection
