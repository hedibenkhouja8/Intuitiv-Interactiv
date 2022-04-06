<?php

namespace Database\Factories;

use App\Models\Critere;
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
       
       $encadreur = Encadreur::all();
       $critere = Critere::all();
        return [
            'titre' => $this->faker->name,
            'id_etudiant' =>$this->faker->randomDigit, 
            
            'annee' =>$this->faker->randomDigit,
            'etablisement_id'=>$this->faker->randomElement($etablisement),
            
            'description' =>$this->faker->name, 
            'fichierpdf' =>$this->faker->name, 
            'id_etudiant' =>$this->faker->randomDigit,             
        ];
    }
}
