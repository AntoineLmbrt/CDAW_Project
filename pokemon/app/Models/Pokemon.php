<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemon';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $connection = 'mysql';
    
    use HasFactory;
}
