<?php

namespace App\Models;
use App\Models\User;
use App\Models\DemandeDepot;
use App\Models\DemandeEmprunt;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['titre','content','viewed','user_id','admin','demande_depot_id','demande_emprunt_id'];
 
  
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function demande_depot()
    {
        return $this->belongsTo(DemandeDepot::class);
    }
    public function demande_emprunts()
    {
        return $this->belongsTo(DemandeEmprunt::class);
    }
    
}
