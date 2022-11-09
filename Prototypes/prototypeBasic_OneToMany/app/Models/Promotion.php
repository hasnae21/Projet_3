<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apprenant;

class Promotion extends Model
{

    use HasFactory;

    protected $table = "promotions";
    
    protected $colone = [
        'name',
    ];

    public function promotions()
    {
        return $this->hasMany(Apprenant::class,'promotion_id','id');
    }
}
