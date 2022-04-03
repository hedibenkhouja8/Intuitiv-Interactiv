<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeDepot extends Model
{
    use HasFactory;
    protected $fillable = ['titre','id_etudiant','id_encadreur','date_memoire','description','status','fichierpdf','fichierdemande','criteres','nbpages'];

}
