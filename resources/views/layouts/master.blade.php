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

    @vite(['resources/css/app.css'])
    @yield('styles')
</head>

<body>
    @include('layouts.menu')
    <main>@yield('content')</main>
    {{-- @include('layouts.footer') --}}
    @yield('afterFooter')
</body>

</html>
