<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Briefs_apprenant extends Model
{
    use HasFactory;

    protected $fillable = ['brief_id', 'apprenant_id'];

    public function apprenantsBrief(){
        return $this->belongsToMany(Brief::class, 'briefs_apprenants');
    }

    public function briefsApprenant(){
        return $this->belongsToMany(Apprenant::class, 'briefs_apprenants');
    }
}
