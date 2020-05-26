<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes', function () {
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
});

Route::get('/recipes/{id}', function ($id) {
    return view('details', ['id' => $id]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
