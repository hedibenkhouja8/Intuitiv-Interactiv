<?php

namespace App\Models;

use App\Models\Domain;
use App\Models\Domaine;
use App\Models\DemandeDepot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Critere extends Model
{
    protected $fillable = ['nom','domaine_id'];
    use HasFactory;
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
    public function demandedepots()
    {
        return $this->belongsToMany(DemandeDepot::class);
    }
}
