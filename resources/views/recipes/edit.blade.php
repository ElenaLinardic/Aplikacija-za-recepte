@extends('layouts.app')

@section('content')
<div class="wrapper create-recipe">
    <h1>Izmjena podataka o receptu</h1>
    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('recipes.form')
    </form>
</div>
@endsection
