<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotDomaineDemandedepot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_depot_domaine', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('domaine_id')->constrained();
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
