<?php

namespace App\Models;

use App\Models\Critere;
use App\Models\Empreint;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use App\Models\DemandeEmpreint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Memoire extends Model
{
    use HasFactory;
    protected $fillable = ['titre','id_etudiant','annee','description','etablisement_id','fichierpdf','encadreur','criteres'];
    public function demendeempreints()
    {
        return $this->hasMany(DemandeEmpreint::class);
    }
    public function empreints()
    {
        return $this->hasMany(Empreint::class);
    }
    public function etablisement()
    {
        return $this->belongsTo(Etablisement::class);
    }
    public function demandedepot()
    {
        return $this->hasOne(DemandeDepot::class);
    }
    public function criteres()
    {
        return $this->belongsToMany(Critere::class);
    }
}
