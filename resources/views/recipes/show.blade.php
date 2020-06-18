@extends('layouts.app')

@section('content')
<div class="wrapper recipe-details">
    <h1>{{ $recipe->name }}</h1>
    <h5>Ocijena: {{ $stars }}<i class="fa fa-star" aria-hidden="true"></i></h5>
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
    <hr>
    @if(auth()->user()->favorites()->where('recipe_id', '=', $recipe->id)->exists())
    <form action="{{ route('favorites.destroy', $recipe->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button><i class="fa fa-heart" aria-hidden="true"></i></button>
    </form>
    <br>
    @else
    <form action="{{ route('favorites.store', $recipe->id) }}" method="POST">
        @csrf
        <button>Dodaj u favorite</i></button>
    </form>
    <br>
    @endif
    <br>
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
        <button type="submit">Dodaj komentar</button>
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
    <button class="btn btn-primary" data-toggle="modal" data-target="#planModal">Planiraj recept</button>
</div>
<a href="/recipes" class="back"><- Povratak na recepte</a>
<div class="modal" id="planModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Planiraj recept</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('plan.store', $recipe->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="date" class="col-form-label">Odredi datum:</label>
                        <input type="date" class="form-control" id="date" name='date'>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Odaberi sastojke koje treba nabaviti:</label>
                        <br>
                        @foreach($recipe->ingredients as $ingredient)
                            <input type="checkbox" id="ingredients[]" name="ingredients[]" value="{{ $ingredient }}">
                            <label for="ingredients[]">{{ $ingredient }}</label><br>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Spremi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
