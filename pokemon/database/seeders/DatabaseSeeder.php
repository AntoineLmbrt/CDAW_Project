<?php

namespace Database\Seeders;

use App\Models\Energy;
use App\Models\Pokemon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        Energy::fetchEnergies();
        Pokemon::fetchPokemons();
    }
}
