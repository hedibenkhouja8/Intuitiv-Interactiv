<?php

namespace App\Models;

use App\Models\Memoire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeEmpreint extends Model
{
    use HasFactory;
    protected $fillable = ['id_etudiant','description','status','type','date_debut','date_fin','memoire_id'];
    public function memoire()
    {
        return $this->belongsTo(Memoire::class);
    }
}
