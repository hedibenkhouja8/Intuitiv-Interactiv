<?php

namespace App\Models;

use App\Models\User;
use App\Models\Encadreur;
use App\Models\Etablisement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeDepot extends Model
{
    use HasFactory;
    protected $fillable = ['titre','user_id','id_encadreur','date_memoire','description','status','fichierpdf','fichierdemande','criteres','nbpages'];
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
    
    public function criteres()
    {
        return $this->belongsToMany(Critere::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
