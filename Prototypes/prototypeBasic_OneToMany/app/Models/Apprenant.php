<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;

    protected $table = "apprenants";
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'promotion_id',
    ];

    public function promotionOne()
    {
        return $this->belongsTo(Apprenant::class)->withDefault();
    }
}
