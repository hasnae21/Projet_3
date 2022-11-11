<?php

namespace App\Models;

use App\Models\Apprenent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table='promotions';

    public function apprenet(){
        return $this->hasMany(Apprenent::class);
    }
}
