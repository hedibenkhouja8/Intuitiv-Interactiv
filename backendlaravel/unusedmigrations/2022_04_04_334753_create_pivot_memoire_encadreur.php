<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotMemoireEncadreur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encadreur_memoire', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('memoire_id')->constrained();
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
        Schema::dropIfExists('pivot_memoire_encadreur');
    }
}
