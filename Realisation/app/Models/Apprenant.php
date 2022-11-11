<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promotion;
use App\Models\Brief;

class Apprenant extends Model
{
    use HasFactory;
    protected $table = "apprenants";
    protected $fillable = [
        'promotion_id',
        'nom',
        'prenom',
        'email',
    ];

    public function apprenantsPromotion()
    {
        return $this->belongsTo(Promotion::class,'promotion_id','id')->withDefault();
    }

    public $timestamps = true;

    public function apprenantsBrief(){
        return $this->belongsToMany(Brief::class, 'briefs_apprenants');
    }
}
