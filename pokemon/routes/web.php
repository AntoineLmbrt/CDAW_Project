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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\homeController@getHome');

Route::get('/pokedex', 'App\Http\Controllers\pokedexController@getPokedex');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Combat route
Route::get('/combat', [\App\Http\Controllers\CombatController::class, 'index'])->middleware('auth');

require __DIR__.'/auth.php';
