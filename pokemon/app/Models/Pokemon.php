<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pokemon extends Model
{
    use HasFactory;


    protected $table = 'pokemons';

    private static  $base_url = "https://pokeapi.co/api/v2/pokemon/";



    public function energy(): BelongsTo
    {
        return $this->belongsTo(Energy::class);
    }


    public function combats()
    {
        return $this->belongsToMany(Combat::class, 'combat_pokemons');
    }


    public static function fetchPokemons()
    {
        $pokemons = [];
        for ($i = 1 ; $i < 100; $i++){
            $id = $i;
            $data = file_get_contents(self::$base_url. $id . '/');
            $pokemonData = json_decode($data);
            $energy = Energy::select('id')->where('name', $pokemonData->types[0]->type->name)->first();
            if ($i % 2 == 0) {
                $level = rand(1,10);
            }else{
                $level =1 ;
            }
            Pokemon::create([
                'name' => $pokemonData->name,
                'energy_id' =>  $energy->id ,
                'level' => $level,
                'hp' => $pokemonData->stats[0]->base_stat,
                'attack' =>  $pokemonData->stats[1]->base_stat,
                'special_defense' => $pokemonData->stats[4]->base_stat,
                'special_attack' => $pokemonData->stats[3]->base_stat,
                'image' => $pokemonData->sprites->other->dream_world->front_default,
            ]);
        };

    }
}