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
            'nom' => $this->faker->name, 'ville' => $this->faker->name,
        ];
    }
}
