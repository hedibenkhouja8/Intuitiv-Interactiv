<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablisement extends Model
{
    use HasFactory;
    protected $fillable = ['nom','ville'];
}
