<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memoires', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->integer('id_etudiant');
            $table->year('annee');
            $table->string('description');
            $table->foreignId('etablisement_id')->constrained();
          
            $table->string('fichierpdf');
            $table->integer('encadreur');
            $table->string('criteres');
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
        Schema::dropIfExists('memoires');
    }
}
