<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Plan;

class PlanController extends Controller
{
    public function store(Recipe $recipe) {
        $plan = new Plan();

        $data = request()->validate([
            'date' => 'required',
            'ingredients.*' => 'required'
        ]);
        $data['recipe_id'] = $recipe->id;
        $data['user_id'] = auth()->user()->id;

        $plan->create($data);

        return redirect('/recipes/' . $recipe->id);
    }
}
