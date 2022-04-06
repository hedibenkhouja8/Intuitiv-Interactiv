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
        Schema::create('demandedepot_encadreur', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('demandedepot_id')->constrained();
            $table->foreignId('encadreur_id')->constrained()->onDelete('cascade');
      
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
