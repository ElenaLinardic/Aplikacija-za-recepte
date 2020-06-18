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

Route::get('/', function () { return view('home');})->name('home');

Route::get('/recipes', 'RecipeController@index')->name('recipes.index');
Route::get('/recipes/create', 'RecipeController@create')->name('recipes.create')->middleware('auth');
Route::post('/recipes', 'RecipeController@store')->name('recipes.store')->middleware('auth');
Route::get('/recipes/{recipe}', 'RecipeController@show')->name('recipes.show');
Route::get('/recipes/{recipe}/edit', 'RecipeController@edit')->name('recipes.edit')->middleware('auth');
Route::patch('/recipes/{recipe}', 'RecipeController@update')->name('recipes.update')->middleware('auth');
Route::delete('/recipes/{recipe}', 'RecipeController@destroy')->name('recipes.destroy')->middleware('auth');

Route::get('/my-recipes', 'RecipeController@userRecipes')->name('recipes.userRecipes')->middleware('auth');

Route::post('/reviews/{recipe}', 'ReviewController@store')->name('reviews.store')->middleware('auth');
Route::post('/favorites/{recipe}', 'FavoriteController@store')->name('favorites.store')->middleware('auth');
Route::delete('/favorites/{recipe}', 'FavoriteController@destroy')->name('favorites.destroy')->middleware('auth');
Route::post('/plans/{recipe}', 'PlanController@store')->name('plan.store')->middleware('auth');

Route::any('search', 'SearchController@index')->name('search');

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();

