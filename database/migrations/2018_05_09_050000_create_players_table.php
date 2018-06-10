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
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthDate');
            $table->string('description')
                ->nullable();
            $table->unsignedInteger('shirtNumber')
                ->nullable();
            $table->unsignedInteger('FKpositionID')
                ->nullable();
            $table->foreign('FKpositionID')->references('id')->on('positions')->onDelete('cascade');
            $table->unsignedInteger('FKmediaID')
                ->nullable();
            $table->foreign('FKmediaID')->references('id')->on('media')->onDelete('cascade');
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
