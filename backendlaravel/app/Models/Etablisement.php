<?php

namespace App\Models;

use App\Models\Memoire;
use App\Models\Encadreur;
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
    
    public function encadreurs()
    {
        return $this->hasMany(Encadreur::class);
    }
}
