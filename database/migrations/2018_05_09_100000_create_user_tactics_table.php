<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTacticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tactics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('FKuserID');
            $table->foreign('FKuserID')->references('userID')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_tactics');
    }
}
