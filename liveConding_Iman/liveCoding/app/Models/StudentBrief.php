<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBrief extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'brief_id'];
}
