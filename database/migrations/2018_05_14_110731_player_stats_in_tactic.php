<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayerStatsInTactic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_stats_in_tactic', function (Blueprint $table) {
            $table->increments('playerStatsInTacticID');
            $table->unsignedInteger('FKplayersInTacticID');
            $table->foreign('FKplayersInTacticID')->references('playersInTacticID')->on('players_in_tactics')->onDelete('cascade');
            $table->integer('goals')
                ->nullable();
            $table->integer('assists')
                ->nullable();
            $table->integer('yellowCards')
                ->nullable();
            $table->integer('redCards')
                ->nullable();
            $table->integer('playedGames')
            ->nullable();
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
        Schema::dropIfExists('player_stats_in_tactic');
    }
}
