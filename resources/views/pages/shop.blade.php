@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
@endsection

@php
    $f = [];
    for($i = 0; $i < 4; $i++) {
        $f[] = rand(10, 100);
    }
    $i = 0;

@endphp

@section('content')
    <section class="shop container">
        <div class="preview wrapper d-flex align-items-center">
            <ul class="preview d-flex">
                @for($a = 0; $a < count($f); $a++)
                    @if(isset($photos[$a]))
                        <li class="preview_item">
                            <button class="preview_button" data-modal-path="photos_window" data-preview="{{ $a }}">
                                <img class="preview_img" src="{{ $photos[$a] . '/id/' . $f[$a] }}/150/150" loading="lazy" alt="фото компании {{ $shop->name }}">
                            </button>
                        </li>
                    @endif
                @endfor
            </ul>

            <button class="previw_count" data-modal-path="photos_window"  data-preview="0">Все фото</button>
        </div>
        <div class="shop-header d-flex">
            <img class="shop-header_logo" src="{{ $shop->logo . 'id/' . rand(1, 500) }}/100/100"  alt="лого компании {{ $shop->name }}">
            <h2 class="shop-header_title">Комиссионный магазин "{{ $shop->name }}"</h2>
        </div>
        <div class="shop-open"><h4 class="shop-open_title">{{ $timeBeforeClose }}</h4></div>
    </section>
@endsection

@section('modal')
    <div id="photos" class="photos modal-window__container" data-modal-target="photos_window">
        <x-close-btn class="photos_close modal-window__close" />
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($photos as $photo)
                    <div class="swiper-slide d-flex justify-contentrcenter">
                        <img class="photos_img" src="{{ $photo . '/id/' . ($i < 4 ? $f[$i] : rand(1, 200)) }}/1000/700" loading="lazy" alt="фото компании {{ $shop->name }}">
                        @php $i++ @endphp
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
@endsection

@section('afterFooter')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=30c606be-6c96-48b4-a6a2-80eab6220ea3&lang=ru_RU" type="text/javascript"></script>
    @vite(['resources/js/scripts/pages/shop.js'])
@endsection
