<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $connection = 'mysql';

    public function energy() {
        return $this->belongsTo(Energy::class, 'energy_id');
    }

    public function combats() {
        return $this->belongsToMany(Combat::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
    
    use HasFactory;
}
