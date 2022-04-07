<?php

namespace App\Models;

use App\Models\User;
use App\Models\Memoire;
use App\Models\Encadreur;
use App\Models\DemandeDepot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etablisement extends Model
{
    use HasFactory;
    protected $fillable = ['nom','ville'];
    public function memoires()
    {
        return $this->hasMany(Memoire::class);
    }
    public function demandedepots()
    {
        return $this->hasMany(DemandeDepot::class);
    }
    
    public function encadreurs()
    {
        return $this->hasMany(Encadreur::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
