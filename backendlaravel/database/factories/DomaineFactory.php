<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DomaineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
              
            'nom' => $this->faker->
            randomElement($array = array ('Informatique','Physique','Chimie','Math','Giologie','Biologie','Astronomie')) ,// 'b'  
        ];
    }
}
