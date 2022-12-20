<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combat extends Model
{
    protected $table = 'combats';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $connection = 'mysql';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class);
    }

    use HasFactory;
}
