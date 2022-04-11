<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    public function demandedepots()
    {
        return $this->hasMany(DemandeDepot::class);
    }
}
