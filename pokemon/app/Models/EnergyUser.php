<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class EnergyUser extends Model {
    protected $table = 'energy_users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $connection = 'mysql';
    protected $fillable = [
        'energy_id',
        'user_id'
    ];

    // those are all the relations that are available
    public function energy() {
        return $this->belongsTo(Energy::class, 'energy_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}