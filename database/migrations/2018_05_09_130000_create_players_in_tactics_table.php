<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersInTacticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_in_tactics', function (Blueprint $table) {
            $table->increments('playersInTacticID');
            $table->unsignedInteger('FKplayerID');
            $table->foreign('FKplayerID')->references('playerID')->on('players')->onDelete('cascade');
            $table->unsignedInteger('FKtacticID');
            $table->foreign('FKtacticID')->references('tacticID')->on('tactics')->onDelete('cascade');
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
        Schema::dropIfExists('players_in_tactics');
    }
}
