<?php

namespace Database\Seeders;

use App\Models\Hedi;
use App\Models\User;
use App\Models\Critere;
use App\Models\Memoire;
use App\Models\Empreint;
use App\Models\Encadreur;
use Faker\Factory as Faker;
use App\Models\Etablisement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
       Etablisement::factory(10)->create();
       
       Critere::factory(10)->create();
        
      $empreints  =Empreint::factory(10)->create();
       
         Encadreur::factory(10)->create();
       $user=  User::factory(10)->create();
       
Memoire::factory()->count(3)
    ->create();
    foreach (Memoire::all() as $memoire){

        $critere = Critere::inRandomOrder()->take(rand(1,3))->pluck('id');
        
        $encadreur = Encadreur::inRandomOrder()->take(rand(1,2))->pluck('id');
        $memoire->encadreurs()->attach($encadreur);
        $memoire->criteres()->attach($critere);
        $memoire->empreints()->saveMany($empreints);
    }
       //  $this->call(MamoireSeeder::class);
    }
}
