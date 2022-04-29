<?php

namespace Database\Factories;

use App\Models\Etablisement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncadreurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $etablisement = Etablisement::all()->pluck('id');
        return [
            
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'etablisement_id'=>$this->faker->randomElement($etablisement),
            'profilepic'=>'encadreur.jpg',
            'description' =>$this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
        ];
    }
}
