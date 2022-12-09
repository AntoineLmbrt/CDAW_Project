<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class homeController extends Controller
{
    public function getHome() {
        $pokemons = Pokemon::with('energy')->get();
        return view('home', ['pokemons'=>$pokemons]);
    }
}
