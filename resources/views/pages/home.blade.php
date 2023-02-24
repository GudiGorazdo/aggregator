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
        <h2 class="display-3 text-center mb-3">Скупки ноутбуков в Московском районе</h2>
        <div class="more-link text-center mb-3"><a href="#">Подробнее</a></div>
        <button class="change-display btn btn-primary d-block mb-5">Карта</button>

        @include('layouts.shop.shop-list', ['shops' => $shops])

        <h3 class="display-4">Похожие категории</h3>
        <h4 class="">скупка категорий техники:</h4>
        <ul>
            <li>Скупка телефонов</li>
            <li>Скупка планшетов</li>
            <li>Скупка фотоаппаратов</li>
        </ul>
        <h4 class="">скупка в других районах:</h4>
        <ul>
            <li>Скупка в Центральном районе</li>
            <li>Скупка Ленинском районе</li>
            <li>Скупка Калининском районе</li>
        </ul>
        <div class="connect-us">
            <a href="#">Связаться с нами</a>
        </div>
        <div class="more-link">
            <a href="#">Подробнее</a>
        </div>
        <div class="send-everyone">
            <a class="send-everyone_link" href="#">Подробнее</a>
        </div>
         <button
            id="show_filters"
            class="filters_show btn"
            data-modal-path="aside_menu"
            data-modal-animation="fadeInLeft"
            data-modal-one-button="true"
        >Фильтры</button>
    </section>
@endsection

@section('afterFooter')
@endsection
