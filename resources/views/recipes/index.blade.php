@extends('layouts.app')

@section('content')
<div class="wrapper recipe-index">
   <h1>Recepti</h1>
    @foreach($recipes as $recipe)
    <div class="recipe-item">
        <img src="/img/recipe.png" alt="recipe image">
        <h4><a href="/recipes/{{ $recipe->id }}">{{ $recipe->name }}</a></h4>
    </div>
    @endforeach
</div>
@endsection

