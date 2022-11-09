<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $table = "taches";

    protected $fillable = [
        'brief_id',
        'num_tache',
        'date_debut',
        'date_fin',
        'description',
    ];

}
