<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listePokemonsController extends Controller
{
    public function getListePokemons() {
        return view('listePokemons', ['pokemons'=>$pokemons]);
    }
}
