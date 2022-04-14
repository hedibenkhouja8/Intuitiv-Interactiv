<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Memoire;
use App\Models\Encadreur;
use App\Models\Entreprise;
use App\Models\Etablisement;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeDepotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $etablisement = Etablisement::all()->pluck('id');
        
        $entreprise = Entreprise::all()->pluck('id');
        
        $memoire = Memoire::all()->pluck('id');
        $user = User::all()->pluck('id');
       
        return [
            'titre' => $this->faker->name,
            'user_id' =>$this->faker->randomElement($user),   
            
            'etablisement_id'=>$this->faker->randomElement($etablisement),
            
            'entreprise_id'=>$this->faker->randomElement($entreprise),
             
            'description' =>$this->faker->name,
            
            'status' =>$this->faker->name,
            'nbpages' =>$this->faker->randomDigit,   
            'coverimage'=>$this->faker->name, 
            'fichierdemande' =>$this->faker->name,   
            'fichierpdf' =>$this->faker->name,  
            
            'fichierbrevet' =>$this->faker->name,  
            'fichierrecherche' =>$this->faker->name,            
        ];
    }
}
