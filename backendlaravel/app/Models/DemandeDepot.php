<?php

namespace App\Models;
use App\Models\Notification;

use App\Models\User;
use App\Models\Critere;
use App\Models\Domaine;
use App\Models\Encadreur;
use App\Models\Entreprise;
use App\Models\Etablisement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeDepot extends Model
{
    use HasFactory;
    protected $fillable = ['titre','user_id','description','status','fichierpdf','fichierdemande','nbpages','coverimage','fichierbrevet','fichierrecherche','entreprise_id','encadreur_id','domaine_id','critere_id'];
    /**
     * Get the user that owns the phone.
     */
    public function memoire()
    {
        return $this->hasOne(Memoire::class);
    }
    public function encadreur()
    {
        return $this->belongsTo(Encadreur::class);
    }
    public function etablisement()
    {
        return $this->belongsTo(Etablisement::class);
    }
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
    public function critere()
    {
        return $this->belongsTo(Critere::class);
    }
}
