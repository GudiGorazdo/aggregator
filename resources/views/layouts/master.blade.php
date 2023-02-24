<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>

    @yield('title')

    @vite([ 'resources/scss/app.scss' ])
    {{-- @vite(['resources/css/app.css']) --}}
    @yield('styles')
</head>

<body>
    <button id="burger" class="js-colorlib-nav-toggle colorlib-nav-toggle open" data-modal-path="aside_menu" data-modal-animation="fadeInLeft" data-modal-one-button="true"><i></i></button>
    <main id="main-content" class="main-content">@yield('content')</main>
    {{-- @include('layouts.footer') --}}
    <div class="modal-window">@include('layouts.aside')</div>
    @yield('afterFooter')
    @vite([ 'resources/js/app.js' ])
</body>

</html>
