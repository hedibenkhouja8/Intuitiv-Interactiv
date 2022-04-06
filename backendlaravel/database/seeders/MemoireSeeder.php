<?php

namespace Database\Seeders;

use App\Models\Memoire;
use Illuminate\Database\Seeder;

class MemoireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Memoire::class,10)->create();
   
    }
}
