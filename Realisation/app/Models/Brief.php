<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tache;
use App\Models\Apprenant;

class Brief extends Model
{
    use HasFactory;
    protected $table = "briefs";
    protected $fillable = [
        'nom_brief',
        'date_debut',
        'date_fin',
    ];

    public function briefsTache(){
        return $this->hasMany(Tache::class,'brief_id','id');
    }

    public $timestamps = true;

    public function briefsApprenant(){
        return $this->belongsToMany(Apprenant::class, 'briefs_apprenants');
    }
}
