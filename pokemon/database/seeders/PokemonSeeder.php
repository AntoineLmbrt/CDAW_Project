<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number= 50;
        $limit= "?limit=".$number;
        $URL = "https://pokeapi.co/api/v2/pokemon/";
        $pokemons = json_decode(file_get_contents($URL.$limit))->results;
        foreach($pokemons as $pokemon) {
            DB::table('pokemon')->insert([
                //'energy_id' => preg_replace('/\//','', substr(json_decode(file_get_contents($URL.$pokemon->name))->types[0]->type->url, -3)),
                'name' => $pokemon->name,
                // ajouter les clés étrangères
                'pv_max' => rand(150,200),
                'level' => rand(1,10),
                'path' => json_decode(file_get_contents($URL.$pokemon->name))->sprites->front_default
            ]);
        }
    }
}