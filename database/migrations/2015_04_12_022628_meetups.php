<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meetups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meetups', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->date('date');
            $table->string('location');

            $table->timestamps();
        });

        Schema::create('meetup_attendees', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('meetup_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('meetup_id')->references('id')->on('meetups');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('meetup_attendees');
		Schema::drop('meetups');
	}

}
