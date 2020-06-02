<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function index() {
        $recipes = Recipe::latest()->get();

        return view('recipes.index', compact('recipes'));
    }

    public function show($id) {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.show', compact('recipe'));
    }

    public function create() {
        return view('recipes.create');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required|min:5',
            'type' => 'required',
            'ingredients' => 'required',
            'description' => 'required'
        ]);

        Recipe::create($data);

        return redirect('/')->with('mssg', 'Recept je spremljen!');
    }

    public function destroy($id) {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect('/recipes');
    }
}
