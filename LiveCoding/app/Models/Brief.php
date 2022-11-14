<?php
namespace App\Models;
use App\Models\Tache;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brief extends Model
{
    use HasFactory;

    protected $table = 'briefs';
    protected $fillable = [
        'nomBrief',
        'heurLivraison',
        'heurRecuperation',
    ];

    public function briefs(){
        return $this->hasMany(Tache::class, 'Brief_id', 'id');
    }

}
