@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
    <link rel="preload" href="{{ asset('assets/images/Loading_black.gif') }}" as="image">
    @vite(['resources/styles/pages/shop/index.scss'])
@endsection

@php
    $photos = json_decode($shop->photos);

    $f = [];
    for ($i = 0; $i < count($photos); $i++) {
        $f[] = rand(10, 100);
    }
    $i = 0;
@endphp

@section('content')
    <input id="shop_coord" type="hidden" name="shop_coord" value={{ $shop->coord }} data-shop-path={{ $shop->id }}>
    @include('pages.shop.layouts.carousel-preview', ['photos' => $photos])
    @include('pages.shop.layouts.heading', ['title' => $shop->name])
    @include('pages.shop.layouts.info', [
        'shop' => $shop,
        'web' => $web,
        'additionalPhones' => $additionalPhones,
    ])
    @include('pages.shop.layouts.sell', ['categories' => $categories])
    @include('pages.shop.layouts.feedback', ['shop' => $shop])
    @include('layouts.similar-companies', ['similars' => $similars])
    @include('layouts.similar-categories-and-location', ['cityID' => $shop->city_id])
@section('modal')
    <div id="photos" class="photos-carousel modal-window__container" data-modal-target="photos_window">
        <x-close-btn id="exit_fullscreen_photos" class="photos-carousel__close modal-window__close" />
        @include('layouts.photos-carousel', ['photos' => $photos])
    </div>
@endsection
@endsection

@section('afterFooter')
<script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU"
    type="text/javascript"></script>
@vite(['resources/js/scripts/pages/shop/index.js'])
@endsection
