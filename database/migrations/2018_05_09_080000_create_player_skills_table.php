<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('FKplayerID');
            $table->foreign('FKplayerID')->references('id')->on('players')->onDelete('cascade');
            $table->integer('shooting')
                ->nullable();
            $table->integer('defending')
                ->nullable();
            $table->integer('speed')
                ->nullable();
            $table->integer('dribbling')
                ->nullable();
            $table->integer('stamina')
                ->nullable();
            $table->integer('weight')
                ->nullable();
            $table->integer('height')
                ->nullable();
            $table->string('preferredFoot')
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
        Schema::dropIfExists('player_skills');
    }
}
