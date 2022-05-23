<?php

namespace Database\Seeders;

use App\Models\Hedi;
use App\Models\User;
use App\Models\Domain;
use App\Models\Critere;
use App\Models\Domaine;
use App\Models\Emprunt;
use App\Models\Kritere;
use App\Models\Memoire;
use App\Models\Encadreur;
use App\Models\Entreprise;
use Faker\Factory as Faker;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use App\Models\DemandeEmprunt;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   /*  DB::table('domaines')->insert([
        'nom' => 'Informatique',
    ]); DB::table('domaines')->insert([
        'nom' => 'Comptabilité',
    ]); DB::table('domaines')->insert([
        'nom' => 'Business',
    ]); DB::table('domaines')->insert([
        'nom' => 'Chimie',
    ]); DB::table('domaines')->insert([
        'nom' => 'Math',
    ]);DB::table('domaines')->insert([
        'nom' => 'Medecine',
    ]);DB::table('domaines')->insert([
        'nom' => 'Art',
    ]);DB::table('domaines')->insert([
        'nom' => 'Langues',
    ]); DB::table('domaines')->insert([
        'nom' => 'Autre',
    ]);*/
        
        Etablisement::factory()->count(6)
        ->create();
       
        Entreprise::factory(10)->create();
        
        Encadreur::factory(10)->create();
        Emprunt::factory(10)->create();
       Critere::factory(10)->create();
       
      // User::factory(1000)->create();
       DemandeEmprunt::factory(1000)->create();
       
    
       
//$memoire=Memoire::factory()->count(200) ->create();
DemandeDepot::factory()->count(100) ->create();
  // DemandeDepot::factory(200)  ->for($memoire)->create();
   /* foreach (Memoire::all() as $memoire){

        $domaine = domaine::inRandomOrder()->take(rand(1,3))->pluck('id');
        
        $encadreur = Encadreur::inRandomOrder()->take(rand(1,2))->pluck('id');
        $memoire->encadreurs()->attach($encadreur);
        $memoire->domaines()->attach($domaine);
    }*/
       //  $this->call(MamoireSeeder::class);
    }
}
