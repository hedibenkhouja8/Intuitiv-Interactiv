<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeEmpreintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $memoire = Memoire::all()->pluck('id');
        return [
             
            'id_etudiant' => $this->faker->randomDigit,  
            'status' => $this->faker->name,  
            'description' => $this->faker->name,  
            'type' => $this->faker->name,  
            'memoire_id' => $this->faker->randomElement($memoire),  
            'date_debut' => $this->faker->dateTime($max = 'now', $timezone = null),
            'date_fin' => $this->faker->dateTime($max = 'now', $timezone = null), 
        ];
    }
}
