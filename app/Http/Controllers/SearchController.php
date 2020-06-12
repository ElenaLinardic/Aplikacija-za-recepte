<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class SearchController extends Controller
{
    public function index(){
    	$q = request()->validate([
    		'query' => 'required|min:3'
    	],[
    		'query.required' => 'Unos pojma za pretraživanje je obavezan',
    		'query.min' => 'Uneseni pojam za pretraživanje mora imati najmanje 3 znaka'
    	]);
    	$result = Recipe::where('name','LIKE', '%' . $q['query'] . '%')->get();
    	if(count($result) > 0)
    		return  view('recipes.index', compact('result'));
    	else return redirect(route('recipes.index'))->withMessage('Traženi pojam: "' . $q['query'] .'" nema rezultata. Pokušajte ponovno.');
    }
}
