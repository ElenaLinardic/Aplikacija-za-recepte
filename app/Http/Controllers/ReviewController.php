<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Review;

class ReviewController extends Controller
{
    public function store(Recipe $recipe) {
        $review = new Review();

        $data = request()->validate([
            'comment' => 'required',
            'rating' => 'required'
        ]);
        $data['recipe_id'] = $recipe->id;
        $data['user_id'] = auth()->user()->id;

        $review->create($data);

        return redirect('/recipes/' . $recipe->id);
    }
}
