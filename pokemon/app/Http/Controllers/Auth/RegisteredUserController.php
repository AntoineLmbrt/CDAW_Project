<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EnergyUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $formfields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
         ]);
 
         $formfields['password'] = bcrypt($formfields['password']);
         $formfields['level'] = 1 ;
         $pokemons = [];
         while (count($pokemons) < 3) {
             $energy = DB::table('energies')
                 ->inRandomOrder()
                 ->first();
 
             $pokemons = DB::table('pokemons')
                 ->where('level', '=', 1)
                 ->where('energy_id', '=', $energy->id)
                 ->get();
         }
 
         $user = User::create($formfields);
         EnergyUser::create([
             'user_id' => $user->id,
             'energy_id' => $energy->id,
         ]);
 

        //event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request)
{
    $values = $request->only(['name', 'email']);
    $rules = [
        'name' => 'required|max:255|unique:users,name,' . $request->user()->id,
        'email' => 'required|email|max:255|unique:users,email,' . $request->user()->id,
    ];
    if($request->password) {
        $rules['password'] = 'string|confirmed|min:8';
        $values['password'] =  Hash::make($request->password);
    }
    $request->validate($rules);
    $request->user()->update($values);
    
    return back()->with('status', __('You have been successfully updated.'));
}
}
