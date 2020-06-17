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

    public function destroy($recipe_id) {
        $user_id = auth()->user()->id;
        $favorite = Favorite::where(['recipe_id' => $recipe_id, 'user_id' => $user_id])->limit(1);
        $favorite->delete();

        return redirect('/recipes/' . $recipe_id);
    }
}
