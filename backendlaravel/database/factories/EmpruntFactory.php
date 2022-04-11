<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Memoire;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $memoire = Memoire::all()->pluck('id');
        $user = User::all()->pluck('id');
        return [
             
            'user_id' =>$this->faker->randomElement($user),   
            'memoire_id'=>$this->faker->randomElement($memoire),  
            'date_debut' => $this->faker->dateTime($max = 'now', $timezone = null),
            'date_fin' => $this->faker->dateTime($max = 'now', $timezone = null), 
        ];
    }
}
