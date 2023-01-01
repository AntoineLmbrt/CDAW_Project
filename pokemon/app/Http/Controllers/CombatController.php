<?php

namespace App\Http\Controllers;

use App\Models\Combat;
use App\Models\CombatPokemon;
use App\Models\CombatUser;
use App\Models\EnergyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CombatController extends Controller
{
    //


    public function index(Request $request)
    {


        return view('combat', [
            'users' => \App\Models\User::with('combats')
                ->with('combatsWon')
                ->where('id','!=', Auth::id())
                ->get(),
            'pokemons' => \App\Models\Pokemon::inRandomOrder()
                ->with('energy')
                ->get()
        ]);
    }

    public function save(Request $request)
    {
        // creating combat  row
       $combat = Combat::create([
            'mode' => $request->mode,
            'user_id' => $request->winner,
//            'date' => date("Y-m-d H:i:s"),
            'status' => "finished",
        ]);

       // checking if winner should upgrade level
        $user = \App\Models\User::with('combatsWon')
            ->where('id', '=', $request->winner)
            ->first();

        if (count($user->combatsWon) % 10 == 0) {
            $user->update([
                'level' => $user->level++
            ]);
        }

        // adding new energy skill to winner
        $energy = DB::table('energies')
            ->inRandomOrder()
            ->first();

        EnergyUser::create([
            'user_id' => $request->winner,
            'energy_id' => $energy->id,
        ]);

        //adding first user's pokemons played in combat to database
        foreach ($request->pokemons1 as $pokemon)
            CombatPokemon::create([
                'combat_id' => $combat->id,
                'pokemon_id' => $pokemon['id'],
                'user_id' => $request->user1,
            ]);
        //adding second user's pokemons played in combat to database
        foreach ($request->pokemons2 as $pokemon)
            CombatPokemon::create([
                'combat_id' => $combat->id,
                'pokemon_id' => $pokemon['id'],
                'user_id' => $request->user2,
            ]);

        // adding userCombat relationShip
        CombatUser::create([
            'combat_id' => $combat->id,
            'user_id' => $request->user1,
        ]);
        CombatUser::create([
            'combat_id' => $combat->id,
            'user_id' => $request->user2,
        ]);

        return "success";
    }

}