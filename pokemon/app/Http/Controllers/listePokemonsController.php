<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class listePokemonsController extends Controller
{
    public function getListePokemons() {
        $pokemons = DB::table('pokemon')->get();
        return view('listePokemons', ['pokemons'=>$pokemons]);
    }
}
