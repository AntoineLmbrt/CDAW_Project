<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pokemon;

class listePokemonsController extends Controller
{
    public function getListePokemons() {
        $pokemons = Pokemon::with('energy')->get();
        return view('listePokemons', ['pokemons'=>$pokemons]);
    }
}
