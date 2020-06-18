@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('logout') }}">Odjavi se</a>
            @else
                <a href="{{ route('login') }}">Prijavi se</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registriraj se</a>
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
        <div class=links>
            <a href="{{ route('recipes.index') }}">Pretraži recepte</a>
            @if(auth()->user())
                <a href="{{ route('recipes.userRecipes') }}">Moji recepti</a>
                <a href="{{ route('recipes.create') }}">Dodaj novi recept</a>
            @endif
        </div>
    </div>
</div>
@endsection

