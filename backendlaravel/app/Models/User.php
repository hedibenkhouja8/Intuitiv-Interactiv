<?php

namespace App\Models;

use App\Models\Memoire;
use App\Models\Emprunt;
use App\Models\DemandeDepot;
use App\Models\DemandeEmprunt;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','etablisement_id','fichierdemande','prenom','tel','profilepic','role','etatdecompte','nb_demandes_depot','nb_demandes_emprunt'
    ];
    public function etablisement()
    {
        return $this->belongsTo(Etablisement::class);
    }
    public function memoires()
    {
        return $this->hasMany(Memoire::class);
    } public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    } public function demandedepots()
    {
        return $this->hasMany(DemandeDepot::class);
    } public function demande_emprunts()
    {
        return $this->hasMany(DemandeEmprunt::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
