<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('combat_pokemons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('combat_id')->unsigned();
            $table->bigInteger('pokemon_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('pokemon_id')
                ->references('id')
                ->on('pokemons')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('combat_id')
                ->references('id')
                ->on('combats')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
//            $table->integer('health');
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
        Schema::dropIfExists('combat_pokemons');
    }
}