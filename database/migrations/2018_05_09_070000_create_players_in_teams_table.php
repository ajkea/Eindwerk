<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersInTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_in_teams', function (Blueprint $table) {
            $table->increments('playersInTeamID');
            $table->unsignedInteger('FKteamID');
            $table->foreign('FKteamID')->references('teamID')->on('teams')->onDelete('cascade');
            $table->unsignedInteger('FKplayerID');
            $table->foreign('FKplayerID')->references('playerID')->on('players')->onDelete('cascade');
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
        Schema::dropIfExists('players_in_teams');
    }
}
