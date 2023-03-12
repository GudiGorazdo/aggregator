<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
    @vite([ 'resources/scss/app.scss', ])
    @yield('styles')
</head>

<body>
    <main>@yield('content')</main>
</body>

</html>
