<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memoire extends Model
{
    use HasFactory;
    protected $fillable = ['titre','id_etudiant','annee','description','id_etablissement','fichierpdf','encadreur','criteres'];
   
}
