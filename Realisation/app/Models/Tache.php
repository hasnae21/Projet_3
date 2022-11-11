<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brief;


class Tache extends Model
{
    use HasFactory;
    protected $table = "taches";
    protected $fillable = [
        'brief_id',
        'nom_tache',
        'date_debut',
        'date_fin',
        'description',
    ];

    public function taches(){
        return $this->belongsTo(Brief::class,'brief_id','id');
    }
}
