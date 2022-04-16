<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotDemandedepotEncadreur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_depot_encadreur', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('demande_depot_id')->constrained();
            $table->foreignId('encadreur_id')->constrained();
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
