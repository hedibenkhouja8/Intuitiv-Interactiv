<?php

namespace App\Models;

use App\Models\Encadreur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeDepot extends Model
{
    use HasFactory;
    protected $fillable = ['titre','id_etudiant','id_encadreur','date_memoire','description','status','fichierpdf','fichierdemande','criteres','nbpages'];
    /**
     * Get the user that owns the phone.
     */
    public function memoire()
    {
        return $this->belongsTo(Memoire::class);
    }
  /*  public function encadreurs()
    {
        return $this->belongsToMany(Encadreur::class);
    }*/
}
