@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
@endsection

@section('content')
    <section class="container">
        <h2 class="display-3">Скупки ноутбуков в Московском районе</h2>
        <div class="more-link"><a href="#">Подробнее</a></div>
        <button class="change-display btn btn-primary d-block">Карта </button>

        <ul id="shop_list">
            @include('layouts.shop-list')
        </ul>

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
    </section>
@endsection

@section('afterFooter')
@endsection
