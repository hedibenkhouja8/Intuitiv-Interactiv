<?php

namespace App\Models;

use App\Models\Domaine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Critere extends Model
{
    use HasFactory;
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
