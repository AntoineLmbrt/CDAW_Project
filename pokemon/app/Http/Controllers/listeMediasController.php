<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listeMediasController extends Controller
{
    public function getMedia($prenom){
        return view('listeMedias', ['prenom' => $prenom]);
    }
}
