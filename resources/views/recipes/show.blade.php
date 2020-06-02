@extends('layouts.app')

@section('content')
<div class="wrapper recipe-details">
    <h1>{{ $recipe->name }}</h1>
    <p class="type">Kategorija: {{ $recipe->type }}</p>
    <p class="ingredients">Sastojci:</p>
    <ul>
        @foreach($recipe->ingredients as $ingredient)
        <li>{{ $ingredient }}</li>
        @endforeach
    </ul>
    <p class="ingredients">Priprema: {{ $recipe->description }}</p>
    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Izbriši</button>
    </form>
</div>
<a href="/recipes" class="back"><- Povratak na recepte</a>
@endsection
