<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bus_id')->unsigned();
			$table->integer('route_id')->unsigned();
			$table->date('date');
			$table->time('time');
			$table->integer('seatLimit');
			$table->integer('ticket_price');
			$table->integer('discount_kid');
			$table->integer('discount_student');
			$table->integer('discount_elder');
			$table->integer('luggage_below_10');
			$table->integer('luggage_below_50');
			$table->integer('luggage_below_100');
			$table->integer('seatlimit');
			$table->boolean('status');
			$table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
			$table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
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
		Schema::table('booking_details', function(Blueprint $table)
		{
			$table->dropforeign('booking_details_bus_id_foreign');
			$table->dropforeign('booking_details_route_id_foreign');
		});

		Schema::drop('booking_details');
	}

}
