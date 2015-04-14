<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShareRequests extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('share_requests', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('meetup_id')->unsigned();
            $table->integer('requester')->unsigned();
            $table->integer('requestee')->unsigned();

            $table->foreign('meetup_id')->references('id')->on('meetups');
            $table->foreign('requester')->references('id')->on('users');
            $table->foreign('requestee')->references('id')->on('users');

            $table->string('share_data');
            $table->boolean('accepted');

            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('share_requests');
	}

}
