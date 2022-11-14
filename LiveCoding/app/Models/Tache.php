<?php
namespace App\Models;
use App\Models\Brief;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tache extends Model
{
    use HasFactory;

    protected $table = 'taches';
    protected $fillable = [
        'nomTache',
        'debutTache',
        'finTache',
        'description',
        'Brief_id',
    ];


    public function taches(){
        return $this->belongsTo(Brief::class, 'Brief_id', 'id');
    }
}
