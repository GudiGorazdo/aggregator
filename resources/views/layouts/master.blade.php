<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    @yield('title')

    @vite([ 'resources/scss/app.scss' ])

    @yield('styles')
</head>

<body>
    @auth("admin")
        @include('layouts.admin.panel')
    @endauth
    @include('layouts.header')
    <main id="main-content" class="main-content">@yield('content')</main>
    {{-- @include('layouts.similar') --}}
    @include('layouts.footer')
    <div class="modal-window">
        @include('layouts.aside')
        @include('layouts.nav-bar')
        @include('layouts.alert')
        @yield('modal')
    </div>

    @yield('afterFooter')
    @vite([ 'resources/js/app.js' ])
    @auth("admin")
        @vite([ 'resources/js/scripts/admin/panel.js' ])
    @endauth
</body>

</html>
