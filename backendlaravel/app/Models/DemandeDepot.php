<?php

namespace App\Models;

use App\Models\User;
use App\Models\Domaine;
use App\Models\Encadreur;
use App\Models\Entreprise;
use App\Models\Etablisement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeDepot extends Model
{
    use HasFactory;
    protected $fillable = ['titre','user_id','id_encadreur','date_memoire','description','status','fichierpdf','fichierdemande','criteres','nbpages','coverimage','fichierbrevet','fichierrecherche','entreprise_id'];
    /**
     * Get the user that owns the phone.
     */
    public function memoire()
    {
        return $this->belongsTo(Memoire::class);
    }
    public function encadreurs()
    {
        return $this->belongsToMany(Encadreur::class);
    }
    public function etablisement()
    {
        return $this->belongsTo(Etablisement::class);
    }
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function domaines()
    {
        return $this->belongsToMany(Domaine::class);
    }
}
