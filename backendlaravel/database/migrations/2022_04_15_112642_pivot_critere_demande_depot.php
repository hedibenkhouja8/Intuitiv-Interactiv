<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotCritereDemandeDepot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critere_demande_depot', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('critere_id')->constrained();
            $table->foreignId('demande_depot_id')->constrained();
      
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
