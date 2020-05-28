<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        $recipes = [
            ['name' => 'palačinke', 'type' => 'deserti'],
            ['name' => 'pizza sa 4 vrste sira', 'type' => 'pizze'],
            ['name' => 'juha od šparoga', 'type' => 'juhe']
        ];

        return view('recipes', [
            'recipes' => $recipes,
            'name' => request('name'),
            'age' => request('age')
        ]);
    }

    public function show($id) {
        return view('details', ['id' => $id]);
    }
}
