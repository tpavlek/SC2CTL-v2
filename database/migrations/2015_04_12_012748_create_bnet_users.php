<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnetUsers extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnet_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bnet_id')->unsigned();
            $table->integer('realm');
            $table->string('name');
            $table->string('display_name');
            $table->string('profile_url');
            $table->string('race');
            $table->string('league')->nullable();
            $table->integer('terran_wins');
            $table->integer('protoss_wins');
            $table->integer('zerg_wins');
            $table->integer('season_total_games');
            $table->string('highest_league');
            $table->integer('career_total_games');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::drop('bnet_users');
    }

}
