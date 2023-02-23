@extends('layouts.master-login')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')
@endsection

@section('content')
    <section class="container login-form">
        <form>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
@endsection

@section('afterFooter')
@endsection
