@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="content">
        <img src="/img/logo.png" alt="logo">
        <div class="title m-b-md">
            Aplikacija za recepte
        </div>
        <p class="mssg">{{ session('mssg') }}</p>
        <a href="/recipes/create">Dodaj novi recept</a>
    </div>
</div>
@endsection

