<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/img/favicon/favicon-48x48.png') }}">
    <link rel="icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="512x512"
        href="{{ asset('assets/img/favicon/android-chrome-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/img/favicon/android-chrome-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">

    @yield('title')
    @vite(['resources/css/app.scss'])
    @yield('styles')
    @vite(['resources/js/app.js'])
    @yield('links_scripts')
</head>

<body>
    @auth('admin')
        @include('layouts.admin.panel')
    @endauth
    @include('layouts.header')
    <main id="main-content" class="main-content">
        @yield('content')
    </main>
    <div id="modal-window" class="modal-window">
        @yield('modal')
    </div>
    @include('layouts.footer')
    @yield('afterFooter')
    @auth('admin')
        {{-- @vite([ 'resources/js/scripts/admin/panel.js' ]) --}}
    @endauth
</body>

</html>
