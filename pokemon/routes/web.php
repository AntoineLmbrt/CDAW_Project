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

Route::get('/', 'App\Http\Controllers\homeController@getHome');

Route::get('/pokedex', 'App\Http\Controllers\pokedexController@getPokedex');
// contact page route
Route::get('/contact', 'App\Http\Controllers\contactController@getContact');


Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('dashboard');


Route::post('/contact/submit', 'App\Http\Controllers\contactController@submit')->name('contact-form');

Route::get('/combat', [\App\Http\Controllers\CombatController::class, 'index'])->middleware('auth');
Route::post('/combat', [\App\Http\Controllers\CombatController::class, 'save'])->middleware('auth');

require __DIR__.'/auth.php';
