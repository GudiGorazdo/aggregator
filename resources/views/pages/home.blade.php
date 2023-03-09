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
        <h2 class="title display-3 text-center mb-3"> {{ $title }}</h2>
        <div class="descrtiption text-center mb-4">
            <div class="descrtiption-mobile">
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
            <p class="descrtiption-desktop descrtiption-desktop--upper">
                Далеко-далеко за словесными горами, в стране гласных и согласных живут рыбные тексты. Всеми единственное выйти раз буквоград даже это языком букв своих речью до. Щеке, за последний. Пояс страна страну свое свой?
            </p>
        </div>
        <div class="home-buttons-wrapper">
            @if (!count($shops) < 1)
                <x-button-fixed-bottom
                    data-modal-path="site-alert"
                    data-modal-one-button="true"
                    data-alert="Этот функционал временно не доступен."
                >Отправить заявку всем
                </x-button-fixed-bottom>
            @endif
            <x-button-site
                id="show_filters"
                class="filters-show me-2"
                data-modal-path="aside_menu"
                data-modal-animation="fadeInLeft"
                data-modal-one-button="true"
            ><span>Ф</span><span>и</span><span>л</span><span>ь</span><span>т</span><span>р</span><span>ы</span>
        </x-button-site>
            <x-button-site id="change-display" class="change-display">Карта</x-button-site>
        </div>

        <div class="home-content-wrapper mb-5">
            <div id="shops-map" class="shops-map"></div>
            @include('layouts.shop-list', ['shops' => $shops])
        </div>

        <p class="descrtiption-desktop descrtiption-desktop--lower">
            Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Злых, на берегу бросил за продолжил ты маленькая они возвращайся подпоясал составитель свой выйти запятых всемогущая домах она рыбного жизни lorem!Безопасную, инициал. Залетают, свою рукопись? Первую раз силуэт большого если необходимыми. Заголовок, власти лучше. Переписывается, страна всеми имени предложения меня рукописи не коварный свой дорогу, одна назад своего заголовок снова.
        </p>
    </section>
@endsection

@section('modal')
@endsection

@section('afterFooter')
    <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript"></script>
    @vite([ 'resources/js/scripts/pages/home.js' ])
@endsection
