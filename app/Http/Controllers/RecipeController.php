<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Category;
use Intervention\Image\Facades\Image;
use Auth;

class RecipeController extends Controller
{
    public function index() {
        $recipes = Recipe::latest()->get();

        return view('recipes.index', compact('recipes'));
    }

    public function create() {
        $recipe = new Recipe();
        $categories = Category::all();
        return view('recipes.create', compact('recipe', 'categories'));
    }

    public function store() {
        $recipe = auth()->user()->recipes()->create($this->validatedData());

        $this->storeImage($recipe);

        return redirect('/recipes/' . $recipe->id)->with('mssg', 'Recept je spremljen!');
    }

    public function show(Recipe $recipe) {
        if($recipe->reviews->count()) {
            $stars =  $recipe->reviews->sum('rating') / $recipe->reviews->count();
        } else {
            $stars = 0;
        };
        return view('recipes.show', compact('recipe', 'stars'));
    }

    public function edit(Recipe $recipe) {
        $categories = Category::all();
        return view('recipes.edit', compact('recipe','categories'));
    }

    public function update(Recipe $recipe) {
        $recipe->update($this->validatedData());

        $this->storeImage($recipe);

        return redirect('/recipes/' . $recipe->id);
    }

    public function destroy(Recipe $recipe) {
        $recipe->reviews()->delete();
        $recipe->delete();
        return redirect('/recipes');
    }

    protected function validatedData() {
        return request()->validate([
            'name' => 'required|min:5',
            'category_id' => 'required',
            'ingredients.*' => 'required',
            'description' => 'required',
            'image' => 'sometimes|file|image'
        ]);
    }

    private function storeImage($recipe) {
        if (request()->has('image')) {
            $recipe->update([
                'image' => request()->image->store('uploads', 'public')
            ]);

            $image = Image::make(public_path('storage/' . $recipe->image))->fit(300, 300);
            $image->save();
        }
    }

    public function userRecipes() {
        $user = Auth::user();
        $recipes = $user->recipes()->get();
        $favRecipes = $user->favorites()->get();
        return view('recipes.userRecipes', compact('recipes', 'favRecipes'));
    }

}
