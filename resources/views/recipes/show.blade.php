@extends('layouts.app')

@section('content')
<div class="wrapper recipe-details">
    <h1>{{ $recipe->name }}</h1>
    @foreach(range(1,5) as $i)
        <span class="fa-stack" style="width:1em">
            <i class="far fa-star fa-stack-1x"></i>

            @if($stars >0)
                @if($stars >0.5)
                    <i class="fas fa-star fa-stack-1x"></i>
                @else
                    <i class="fas fa-star-half fa-stack-1x"></i>
                @endif
            @endif
        </span>
    @endforeach
    @if($recipe->image)
    <div class="row">
        <div class="col-12"><img src="{{ asset('storage/' . $recipe->image) }}" class="img-thumbnail"></img></div>
    </div>
    @endif
    <a href="/recipes/{{ $recipe->id }}/edit">Uredi</a>
    <p class="type">Kategorija: {{ $recipe->category->name }}</p>
    <p class="ingredients">Sastojci:</p>
    <ul>
        @foreach($recipe->ingredients as $ingredient)
        <li>{{ $ingredient }}</li>
        @endforeach
    </ul>
    <p class="ingredients">Priprema: {{ $recipe->description }}</p>
    @auth
    @if(auth()->user()->id == $recipe->user->id)
    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Izbriši</button>
    </form>
    @else
    <form action="{{ route('favorites.store', $recipe->id) }}" method="POST">
        @csrf
        <button>Dodaj u favorite</button>
    </form>
    <hr>
    <h4>Komentiraj...</h4>
    <form action="{{ route('reviews.store', $recipe->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Komentar</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="rating">Ocjena</label>
            <select class="form-control" id="rating" name="rating">
                <option selected>Odaberi...</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj komentar</button>
    </form>
    @endif
    @endauth
    @if($recipe->reviews->count())
    <hr>
    <h4>Komentari</h4>
    <ul class="list-group">
        @foreach($recipe->reviews as $review)
        <li class="list-group-item"><strong>{{ $review->user->name }}: </strong>{{ $review->comment }} (ocjena: {{ $review->rating }})</li>
        @endforeach
    </ul>
    @endif
</div>
<a href="/recipes" class="back"><- Povratak na recepte</a>
@endsection
