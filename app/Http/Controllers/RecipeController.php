<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function index() {
        $recipes = Recipe::latest()->get();

        return view('recipes.index', [
            'recipes' => $recipes
        ]);
    }

    public function show($id) {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.show', ['recipe' => $recipe]);
    }

    public function create() {
        return view('recipes.create');
    }

    public function store() {
        $recipe = new Recipe();

        $recipe->name = request('name');
        $recipe->type = request('type');
        $recipe->ingredients = request('ingredients');
        $recipe->description = request('description');

        $recipe->save();

        return redirect('/')->with('mssg', 'Recept je spremljen!');
    }

    public function destroy($id) {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect('/recipes');
    }
}
