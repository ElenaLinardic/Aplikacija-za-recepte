@extends('layouts.app')

@section('content')
<div class="wrapper recipe-index">
    <h1>Moji recepti</h1>
    @foreach($recipes as $recipe)
    <div class="recipe-item">
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="recipe image">
        <h4><a href="/recipes/{{ $recipe->id }}">{{ $recipe->name }}</a></h4>
    </div>
    @endforeach
    <br>
    <h1>Moji favoriti</h1>
    @foreach($favRecipes as $favRecipe)
    <div class="recipe-item">
        <img src="{{ asset('storage/' . $favRecipe->recipe->image) }}" alt="recipe image">
        <h4><a href="/recipes/{{ $favRecipe->recipe->id }}">{{ $favRecipe->recipe->name }}<small> by {{ $favRecipe->recipe->user->name }}</small></a></h4>
    </div>
    @endforeach
</div>
@endsection

