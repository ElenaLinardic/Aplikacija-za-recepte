@if( ! isset($result))
<h1>Najnoviji recepti</h1>
<form action="{{ route('search') }}" method="POST">
    @csrf
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Pretraživanje</label>
            <input type="text" name="query" placeholder="Pojam za pretraživanje" value="{{ old('query') }}" class="form-control">
            <p class="help-block text-danger">{{ $errors->first('query') }}</p>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Pretraži</button>
</form>
	<br>
@else
<h1>Rezultati pretrage:</h1>
<a href="{{ route('recipes.index') }}"><- Povratak na najnovije</a>
@foreach($result as $recipe)
<div class="recipe-item">
    <img src="{{ asset('storage/' . $recipe->image) }}" alt="recipe image">
    <h4><a href="/recipes/{{ $recipe->id }}">{{ $recipe->name }}<small> by {{ $recipe->user->name }}</small></a></h4>
</div>
@endforeach
@endif
@if(session()->has('message'))
<div class="alert alert-dismissible alert-info" role="alert">
    {{ session()->get('message') }}
</div>
@endif

