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
        <h2 class="title display-3 text-center mb-3">Скупки ноутбуков в Московском районе</h2>
        <div class="text-center mb-3"><a class="more-link" href="#">Подробнее ...</a></div>
        <div class="filters_buttons-wraper d-flex mb-5">
            <button
                id="show_filters"
                class="filters_show btn site-btn me-2"
                data-modal-path="aside_menu"
                data-modal-animation="fadeInLeft"
                data-modal-one-button="true"
            >Фильтры</button>
            <button class="change-display btn site-btn d-block">Карта</button>
        </div>

        @include('layouts.shop.shop-list', ['shops' => $shops])

        <div class="mb-3">
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
        </div>

        <div class="send-everyone">
            <a class="send-everyone_link btn btn-primary" href="#">Отправить заявку всем</a>
        </div>
    </section>
@endsection

@section('afterFooter')
@endsection
