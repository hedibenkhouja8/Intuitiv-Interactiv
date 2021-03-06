<?php

namespace App\Models;

use App\Models\User;
use App\Models\Memoire;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeEmprunt extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','description','status','type','date_debut','date_fin','memoire_id'];
    public function memoire()
    {
        return $this->belongsTo(Memoire::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
