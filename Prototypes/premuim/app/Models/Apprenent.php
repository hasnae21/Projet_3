<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brif;

class Apprenent extends Model
{
    use HasFactory;
    protected $table='apprenents';
    
    protected $fillable = ['promotion_id'];
    public function brifs(){
        
        return $this->belongsToMany(Brif::class, 'brifapprents');
    }

    
    public function promotion(){
        
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }
}
