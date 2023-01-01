<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombatUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'combat_id',
        'user_id',
    ];
}