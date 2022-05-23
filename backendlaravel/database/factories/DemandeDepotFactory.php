<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Critere;
use App\Models\Domaine;
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
        
        $critere = Critere::all()->pluck('id');
        $domaine = Domaine::all()->pluck('id');
        $encadreur = Encadreur::all()->pluck('id');
        $entreprise = Entreprise::all()->pluck('id');
        
        $memoire = Memoire::all()->pluck('id');
        $user = User::all()->pluck('id');
       
        return [
            'titre' => $this->faker->name,
            'user_id' =>$this->faker->randomElement($user),   
            
            'etablisement_id'=>$this->faker->randomElement($etablisement),
            
            'entreprise_id'=>$this->faker->randomElement($entreprise),
            
            'critere_id'=>Critere::factory(), 
            'domaine_id'=>$this->faker->randomElement($domaine),
            'encadreur_id'=>$this->faker->randomElement($encadreur),
             
            'description' =>$this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            
           'status' =>$this->faker->  randomElement($array = array ('EnAttente','Refuse')) ,// 'b',
    //  'status' =>$this->faker->  randomElement($array = array ('Accepte')),
            'nbpages' =>$this->faker->randomDigit,   
            'coverimage'=>'these.png', 
            'fichierdemande' =>$this->faker->name,   
            'fichierpdf' =>$this->faker->name,  
            
            'fichierbrevet' =>$this->faker->name,  
            'fichierrecherche' =>$this->faker->name,   
            'created_at' => $this->faker->dateTimeBetween('-5 months', '+7 months')         
        ];
    }
}
