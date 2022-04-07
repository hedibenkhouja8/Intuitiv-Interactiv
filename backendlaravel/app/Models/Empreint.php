<?php

namespace App\Models;

use App\Models\User;
use App\Models\Memoire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empreint extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','date_debut','date_fin','memoire_id'];
    public function memoire()
    {
        return $this->belongsTo(Memoire::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
