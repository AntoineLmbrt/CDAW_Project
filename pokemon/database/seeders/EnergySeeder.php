<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number = 20;
        $limit = "?limit=".$number;
        $URL = "https://pokeapi.co/api/v2/type/";
        $energies = json_decode(file_get_contents($URL.$limit))->results;
        foreach($energies as $energy) {
            DB::table('energies')->insert([
                'name' => $energy->name
            ]);
        }
    }
}