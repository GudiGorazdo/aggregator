@extends('layouts.master')

@section('title')
    <title>Agregator</title>
@endsection

@section('styles')

@endsection

@section('content')
  <div class="container">
    @foreach ($shops as $shop)
      <x-shop-item :shop="$shop"></x-shop-item>
    @endforeach
  </div>
@endsection

@section('afterFooter')

@endsection
