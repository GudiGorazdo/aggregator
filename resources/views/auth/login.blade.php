@extends('auth.master')

@section('title')
    <title>Авторизация</title>
@endsection

@section('styles')
    @vite([ 'resources/scss/auth.scss'])
@endsection

@section('content')
    <section class="container login-form">
        <form action="{{ $route }}" method="POST">
            @csrf
            <x-input
                classNamesWrapper="mb-3"
                inputId="login"
                name="login"
                label="Логин"
                type="text"
            />
                <x-input
                classNamesWrapper="mb-3"
                inputId="password"
                name="password"
                label="Пароль"
                type="password"
            />
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </section>
@endsection

@section('afterFooter')
@endsection
