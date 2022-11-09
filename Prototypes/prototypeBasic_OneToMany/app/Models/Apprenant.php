<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function promotionOne()
    {
        return $this->belongsTo(Apprenant::class)->withDefault();
    }
}
