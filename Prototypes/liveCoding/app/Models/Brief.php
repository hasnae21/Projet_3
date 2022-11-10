<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    // use HasFactory;
    protected $fillable = ['name', 'livraisonDate', 'recuperationDate'];

    public $timestamps = true;

    public function students(){
        return $this->belongsToMany(Student::class, 'student_briefs');
    }
}
