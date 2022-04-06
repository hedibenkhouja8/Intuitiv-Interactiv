<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeDepotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_depots', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->integer('id_etudiant');
            $table->date('date_memoire');
            $table->string('description');
            $table->string('status');
            $table->foreignId('memoire_id')->constrained();
            $table->string('fichierpdf');
            $table->string('fichierdemande');
            $table->string('criteres');
            
            $table->foreignId('etablisement_id')->constrained();
            $table->integer('nbpages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_depots');
    }
}
