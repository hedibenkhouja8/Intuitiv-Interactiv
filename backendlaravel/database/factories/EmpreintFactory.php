<?php

namespace Database\Factories;

use App\Models\Memoire;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpreintFactory extends Factory
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
            'date_debut' => $this->faker->dateTime($max = 'now', $timezone = null),
            'date_fin' => $this->faker->dateTime($max = 'now', $timezone = null), 
        ];
    }
}
