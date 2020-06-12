@extends('layouts.app')

@section('content')
<div class="wrapper create-recipe">
    <h1>Dodaj novi recept</h1>
    <form action="{{ route('recipes.store', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @include('recipes.form')
    </form>
</div>
@endsection
