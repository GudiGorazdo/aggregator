@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
@endsection

@section('content')
    <section class="home container">
        @auth("admin")
            {{ Auth::guard('admin')->check() }}
            <h1>sdkjf;alksdf;aklsjdf;klasjdf;aklj</h1>
        @endauth
        <h2 class="title display-3 text-center mb-3">Скупки ноутбуков в Московском районе</h2>
        <div class="descrtiption text-center mb-4">
            <div class="descrtiption_mobile">
                <x-link
                    class="more-link"
                    href="#more_description"
                    data-bs-toggle="collapse"
                    aria-expanded="false"
                    aria-controls="more_description"
                    role="button"
                >Подробнее ...</x-link>
                <div class="collapse" id="more_description">
                    Далеко-далеко за словесными горами, в стране гласных и согласных живут рыбные тексты. Всеми единственное выйти раз буквоград даже это языком букв своих речью до. Щеке, за последний. Пояс страна страну свое свой?
                </div>
            </div>
            <p class="descrtiption_desktop">
                Далеко-далеко за словесными горами, в стране гласных и согласных живут рыбные тексты. Всеми единственное выйти раз буквоград даже это языком букв своих речью до. Щеке, за последний. Пояс страна страну свое свой?
            </p>
        </div>
        <div class="home-buttons-wrapper">
            <x-button-primary-link
                class="send-everyone"
                href="#"
                data-modal-path="site-alert"
                data-modal-one-button="true"
                data-alert="Этот функционал временно не доступен."
            >Отправить заявку всем
            </x-button-link>
            <x-button-site
                id="show_filters"
                class="filters_show me-2"
                data-modal-path="aside_menu"
                data-modal-animation="fadeInLeft"
                data-modal-one-button="true"
            >Фильтры</x-button-site>
            <x-button-site id="change-display" class="change-display">Карта</x-button-site>
        </div>

        <div class="home-content-wrapper mb-5">
            <div id="shops-map" class="shops-map"></div>
            @include('layouts.shop.shop-list', ['shops' => $shops])
        </div>

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
    </section>
@endsection

@section('afterFooter')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript"></script>
    @vite([ 'resources/js/scripts/pages/home.js' ])
@endsection
