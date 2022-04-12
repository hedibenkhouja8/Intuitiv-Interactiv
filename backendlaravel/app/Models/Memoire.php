<?php

namespace App\Models;

use App\Models\Domaine;
use App\Models\Emprunt;
use App\Models\Encadreur;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use App\Models\DemandeEmprunt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Memoire extends Model
{
    use HasFactory;
    protected $fillable = ['titre','user_id','annee','description','etablisement_id','fichierpdf','coverimage','fichierbrevet','fichierrecherche'];
    public function demendeemprunts()
    {
        return $this->hasMany(DemandeEmprunt::class);
    }
    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
    public function etablisement()
    {
        return $this->belongsTo(Etablisement::class);
    }
    public function demandedepot()
    {
        return $this->hasOne(DemandeDepot::class);
    }
    public function domaines()
    {
        return $this->belongsToMany(Domaine::class);
    }
    public function encadreurs()
    {
        return $this->belongsToMany(Encadreur::class);
    }
}
