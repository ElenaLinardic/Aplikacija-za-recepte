<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Favorite;

class FavoriteController extends Controller
{
    public function store($recipe_id) {
        $user_id = auth()->user()->id;
        if(!Favorite::where(['recipe_id' => $recipe_id, 'user_id' => $user_id])->exists()) {
            Favorite::create(['recipe_id' => $recipe_id, 'user_id' => $user_id]);
        }

        return redirect('/recipes/' . $recipe_id);
    }
}
