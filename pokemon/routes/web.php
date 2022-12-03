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
Route::get('/', function () { return view('welcome'); });
Route::get('/listeMedias', 'App\Http\Controllers\listeMediasController@getMedia');




Route::get('/{id}/{name}', function ($id, $name) {
    return '<!doctype html>
    <html lang="fr">
      <head>
          <meta charset="UTF-8">
          <title>Mauvaise façon</title>
      </head>
      <body>
          <p>test test test</p>
      </body>
    </html>';
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/template', function () { return view('template'); });
