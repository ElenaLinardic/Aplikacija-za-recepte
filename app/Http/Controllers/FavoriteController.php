<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Favorite;

class FavoriteController extends Controller
{
    public function store(Recipe $recipe) {
        $favorite = new Favorite();

        $data['user_id'] = auth()->user()->id;
        $data['recipe_id'] = $recipe->id;

        $favorite->create($data);

        return redirect('/recipes/' . $recipe->id);
    }
}
