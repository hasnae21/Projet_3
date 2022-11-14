<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // use HasFactory;
    protected $fillable = ['name'];

    public $timestamps = true;

    public function briefs(){
        return $this->belongsToMany(Brief::class, 'student_briefs');
    }
}
