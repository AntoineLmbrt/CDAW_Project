<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class pokedexController extends Controller
{
    public function getPokedex() {
        $pokemons = Pokemon::with('energy')->get();
        return view('pokedex', ['pokemons'=>$pokemons]);
    }
}
