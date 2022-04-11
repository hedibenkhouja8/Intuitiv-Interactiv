<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Domaine;
use App\Models\Encadreur;
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
        
       $etablisement = Etablisement::all()->pluck('id');
       $user = User::all()->pluck('id');
       $encadreur = Encadreur::all();
       $domaine = Domaine::all();
        return [
            'titre' => $this->faker->name,
            'user_id' =>$this->faker->randomElement($user), 
            
            'annee' =>$this->faker->randomDigit,
            'etablisement_id'=>$this->faker->randomElement($etablisement),
            
            'description' =>$this->faker->name, 
            'fichierpdf' =>$this->faker->name,  
            'fichierbrevet' =>$this->faker->name,  
            'fichierrecherche' =>$this->faker->name,             
        ];
    }
}
