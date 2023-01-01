<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PokemonController extends Controller
{

    public function index(Request $request){
        return view('index', [
            'pokemons' => \App\Models\Pokemon::with('energy')->paginate(10)
        ]);
    }
    public function show(Request $request){
        return view('pokemons', [
            'pokemons' => \App\Models\Pokemon::with('energy')->get(),
            'energies' => \App\Models\Energy::all()
        ]);
    }
    public function sortPokemons(Request $request){
        $postData = $request->post();
        $list = Pokemon::all()->sortByDesc($request->type) ;

        return view('components/listPokemon', [
            'pokemons' => $list
        ]);
    }
}