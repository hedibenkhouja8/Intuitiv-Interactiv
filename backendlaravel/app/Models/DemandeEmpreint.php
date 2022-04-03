<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeEmpreint extends Model
{
    use HasFactory;
    protected $fillable = ['id_etudiant','description','status','type','date_debut','date_fin','id_memoire'];
}
