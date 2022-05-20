<?php

namespace Database\Factories;

use App\Models\Domaine;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtablisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name, 'ville' => $this->faker->randomElement($array = array ('Bizerte','Tunis','Ariana','Ben Arous','Kasserine','Jandouba','Sousse','Tozeur')), 'adresse' => $this->faker->word,
        ];
    }
}
