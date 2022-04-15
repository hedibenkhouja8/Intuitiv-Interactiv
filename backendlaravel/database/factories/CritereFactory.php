<?php

namespace Database\Factories;

use App\Models\Domain;
use App\Models\Domaine;
use Illuminate\Database\Eloquent\Factories\Factory;

class CritereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $domaine = Domaine::all()->pluck('id');
        return [
            'nom' => $this->faker->name,
            
            'domaine_id'=>$this->faker->randomElement($domaine),
        ];
    }
}
