<?php

namespace App\Models;

use App\Models\Memoire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Critere extends Model
{
    use HasFactory;
    protected $fillable = ['nom','id_memoire'];
    public function memoires()
    {
        return $this->belongsToMany(Memoire::class);
    }
}
