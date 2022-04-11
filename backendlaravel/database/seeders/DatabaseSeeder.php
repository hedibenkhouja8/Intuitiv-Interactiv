<?php

namespace Database\Seeders;

use App\Models\Hedi;
use App\Models\User;
use App\Models\Critere;
use App\Models\Domaine;
use App\Models\Emprunt;
use App\Models\Memoire;
use App\Models\Encadreur;
use App\Models\Entreprise;
use Faker\Factory as Faker;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use App\Models\DemandeEmprunt;
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
       
        Entreprise::factory(10)->create();
       Domaine::factory(10)->create();
       
       Critere::factory(10)->create();
       DemandeEmprunt::factory(10)->create();
       
       DemandeDepot::factory(10)->create();
        
    foreach (DemandeDepot::all() as $DemandeDepot){

        $encadreur = Encadreur::inRandomOrder()->take(rand(1,2))->pluck('id');
        $domaine = Domaine::inRandomOrder()->take(rand(1,3))->pluck('id');
        $DemandeDepot->encadreurs()->attach($encadreur);
        
        $DemandeDepot->domaines()->attach($domaine);
    }
       $user=  User::factory(10)->create();
       
Memoire::factory()->count(3)->has(Emprunt::factory(10),'emprunts')
    ->create();
    
   /* foreach (Memoire::all() as $memoire){

        $domaine = domaine::inRandomOrder()->take(rand(1,3))->pluck('id');
        
        $encadreur = Encadreur::inRandomOrder()->take(rand(1,2))->pluck('id');
        $memoire->encadreurs()->attach($encadreur);
        $memoire->domaines()->attach($domaine);
    }*/
       //  $this->call(MamoireSeeder::class);
    }
}
