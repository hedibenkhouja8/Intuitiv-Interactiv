<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpreintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empreints', function (Blueprint $table) {
            $table->id();
            $table->integer('id_etudiant');
            
           // $table->unsignedBigInteger('memoire_id');
           // $table->foreign('memoire_id')->references('id')->on('memoires');
           $table->foreignId('memoire_id')->constrained()->onDelete('cascade');
            $table->date('date_debut');
            $table->date('date_fin');
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
        Schema::dropIfExists('empreints');
    }
}
