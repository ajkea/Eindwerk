<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinates', function (Blueprint $table) {
            $table->increments('coordinateID');
            // $table->integer('xCoordinate');
            // $table->integer('yCoordinate');
            // $table->integer('step');
            // $table->unsignedInteger('FKplayerInTacticID');
            // $table->foreign('playerInTactic')->references('playerInTacticID')->on('playersInTactic')->onDelete('cascade');
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
        Schema::dropIfExists('coordinates');
    }
}
