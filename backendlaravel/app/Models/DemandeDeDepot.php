<?php

namespace App\Models;

use App\Models\Critere;
use App\Models\Memoire;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeDeDepot extends Model
{
    use HasFactory;
    protected $fillable = ['nom','id_memoire'];
    public function memoires()
    {
        return $this->belongsToMany(Memoire::class);
    }
    public function demandedepots()
    {
        return $this->hasMany(DemandeDepot::class);
    }
    public function criteres()
    {
        return $this->hasMany(Critere::class);
    }
    public function etablisements()
    {
        return $this->hasMany(Etablisement::class);
    }
}
