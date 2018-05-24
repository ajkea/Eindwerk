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
            $table->increments('id');
            $table->unsignedInteger('FKplayerID');
            $table->foreign('FKplayerID')->references('id')->on('players')->onDelete('cascade');
            $table->unsignedInteger('FKtacticID');
            $table->foreign('FKtacticID')->references('id')->on('tactics')->onDelete('cascade');
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
