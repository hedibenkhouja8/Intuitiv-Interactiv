<?php

namespace Database\Seeders;

use App\Models\Hedi;
use App\Models\User;
use App\Models\Critere;
use App\Models\Memoire;
use App\Models\Empreint;
use App\Models\Encadreur;
use Faker\Factory as Faker;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use App\Models\DemandeEmpreint;
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
        Etablisement::factory()->count(3)->has(Encadreur::factory(10),'encadreurs')
        ->create();
       
       Critere::factory(10)->create();
       
       DemandeEmpreint::factory(10)->create();
       
       DemandeDepot::factory(10)->create();
        
    foreach (DemandeDepot::all() as $DemandeDepot){

        $encadreur = Encadreur::inRandomOrder()->take(rand(1,2))->pluck('id');
        $critere = Critere::inRandomOrder()->take(rand(1,3))->pluck('id');
        $DemandeDepot->encadreurs()->attach($encadreur);
        
        $DemandeDepot->criteres()->attach($critere);
    }
       $user=  User::factory(10)->create();
       
Memoire::factory()->count(3)->has(Empreint::factory(10),'empreints')
    ->create();
    
    foreach (Memoire::all() as $memoire){

        $critere = Critere::inRandomOrder()->take(rand(1,3))->pluck('id');
        
        $encadreur = Encadreur::inRandomOrder()->take(rand(1,2))->pluck('id');
        $memoire->encadreurs()->attach($encadreur);
        $memoire->criteres()->attach($critere);
    }
       //  $this->call(MamoireSeeder::class);
    }
}
