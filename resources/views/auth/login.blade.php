@extends('auth.master')

@section('title')
    <title>Авторизация</title>
@endsection

@section('styles')
    @vite([ 'resources/scss/auth.scss'])
@endsection

@section('content')
    <section class="container login-form">
        <form>
            @csrf
            <x-input
                classNamesWrapper="mb-3"
                inputId="login"
                classNamesLabel=""
                label="Логин"
                classNamesInput=""
                type="text"
                classNamesDescription=""
            />
            <x-input
                classNamesWrapper="mb-3"
                inputId="password"
                classNamesLabel=""
                label="Пароль"
                classNamesInput=""
                type="password"
                classNamesDescription=""
            />
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </section>
@endsection

@section('afterFooter')
@endsection
