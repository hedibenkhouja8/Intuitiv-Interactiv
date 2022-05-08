<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['titre','content','viewed','user_id','admin'];
 
  
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
