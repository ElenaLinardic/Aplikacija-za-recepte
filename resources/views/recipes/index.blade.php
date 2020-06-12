@extends('layouts.app')

@section('content')
<div class="wrapper recipe-index">
    @include('recipes.search')
	@if( ! isset($result))
    @foreach($recipes as $recipe)
    <div class="recipe-item">
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="recipe image">
        <h4><a href="/recipes/{{ $recipe->id }}">{{ $recipe->name }}<small> by {{ $recipe->user->name }}</small></a></h4>
    </div>
    @endforeach
    @endif
</div>
@endsection

