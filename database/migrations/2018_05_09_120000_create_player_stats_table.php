<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('FKplayerID');
            $table->foreign('FKplayerID')->references('id')->on('players')->onDelete('cascade');
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
        Schema::dropIfExists('player_stats');
    }
}
