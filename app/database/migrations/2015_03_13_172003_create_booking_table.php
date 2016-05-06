<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('bus_id')->unsigned();
            $table->time('remaining_time');
            $table->string('status');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bus_id')->references('id')->on('bus');
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
        Schema::table('booking', function($table){
            $table->dropForeign('booking_user_id_foreign');
            $table->dropForeign('booking_bus_id_foreign');
        });

		Schema::drop('booking');
	}

}
