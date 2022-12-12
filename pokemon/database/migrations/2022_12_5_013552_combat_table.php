<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CombatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jouer_id')->references('id')->on('jouer'); // Cela est ID du table jouer 
            $table->dateTimeTz('date', $precision = 0);
            $table->enum('mode', ['aléatoire', 'manuel + tour par tour', 'aléatoire + tour par tour']);
            
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
        Schema::dropIfExists('combat');
    }
}