<?php

namespace App\Models;

use App\Models\Memoire;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Encadreur extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','etablisement_id','description','profilepic'];
   public function demandedepots()
    {
        return $this->hasMany(DemandeDepot::class);
    }
    public function memoires()
    {
        return $this->belongsToMany(Memoire::class);
    }
    public function etablisement()
    {
        return $this->belongsTo(Etablisement::class);
    }
   
}
