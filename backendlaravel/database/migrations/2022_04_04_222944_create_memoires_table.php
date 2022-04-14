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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->year('annee');
            $table->string('description');
            $table->foreignId('etablisement_id')->constrained();
            
        //    $table->foreignId('demande_depot_id')->constrained();
           $table->foreignId('demande_depot_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('fichierpdf');
            $table->string('coverimage');
            $table->string('fichierbrevet');
            $table->string('fichierrecherche');
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
