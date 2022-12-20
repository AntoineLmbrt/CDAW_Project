<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('energy_id');
            $table->foreign('energy_id')
                ->references('id')
                ->on('energies')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->string('name');
            $table->integer('pv_max');
            $table->integer('level');
            $table->string('path');
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
        Schema::dropIfExists('pokemons');
    }
}