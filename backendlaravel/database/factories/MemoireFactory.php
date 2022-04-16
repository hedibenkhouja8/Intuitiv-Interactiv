<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Domaine;
use App\Models\Encadreur;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemoireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
       $demandedapot = DemandeDepot::all()->pluck('id');
       $etablisement = Etablisement::all()->pluck('id');
       $user = User::all()->pluck('id');
       $encadreur = Encadreur::all();
       $domaine = Domaine::all();
        return [
            'date_acceptation' => $this->faker->date,
            
     //       'demande_depot_id'=>DemandeDepot::factory(),         
        ];
    }
}
