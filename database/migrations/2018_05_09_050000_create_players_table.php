<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('playerID');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthDate');
            $table->string('description')
                ->nullable();
            $table->unsignedInteger('FKpositionID')
                ->nullable;
            $table->foreign('FKpositionID')->references('positionID')->on('positions')->onDelete('cascade');
            $table->unsignedInteger('FKmediaID')
                ->nullable;
            $table->foreign('FKmediaID')->references('mediaID')->on('media')->onDelete('cascade');
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
        Schema::dropIfExists('players');
    }
}
