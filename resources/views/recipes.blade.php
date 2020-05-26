@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <img src="/img/logo.png" alt="logo">
        <div class="title m-b-md">
            Recepti
        </div>

        <p>{{ $name }} - {{ $age }}</p>

        @foreach($recipes as $recipe)
            <div>{{ $recipe['name'] }} - {{ $recipe['type'] }}</div>
        @endforeach
    </div>
</div>
@endsection

