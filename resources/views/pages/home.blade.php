@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')

@endsection

@section('content')
  <div class="conteiner">
    <x-shop-list-item>
      <x-slot name="test">TEST</x-slot>
    </x-shop-list-item>
  </div>
@endsection

@section('afterFooter')

@endsection
