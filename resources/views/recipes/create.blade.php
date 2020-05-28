@extends('layouts.layout')

@section('content')
<div class="wrapper create-recipe">
    <h1>Dodaj novi recept</h1>
    <form action="/recipes" method="POST" enctype="application/json">
        @csrf
        <label for="name">Naziv:</label>
        <input type="text" id="name" name="name">
        <label for="type">Kategorija:</label>
        <select name="type" id="type">
            <option value="desert">desert</option>
            <option value="juh">juha</option>
            <<option value="pizza">pizza</option>
        </select>
        <br>
        <fieldset>
            <label>Sastojci:</label>
            <input name="ingredients[]">
            <input name="ingredients[]">
            <input name="ingredients[]">
            <input name="ingredients[]">
        </fieldset>
        <label for="description">Opis:</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <input type="submit" value="Spremi">
    </form>
</div>
@endsection
