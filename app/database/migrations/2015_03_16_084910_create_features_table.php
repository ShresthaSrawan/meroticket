<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('features', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->string('type');
            $table->integer('reservation_limit');
            $table->integer('laggage');
            $table->string('music');
            $table->string('a/c');
            $table->integer('ticket_price');
            $table->integer('total_seat');
            $table->string('wifi');
            $table->foreign('bus_id')
				->references('id')
				->on('buses');
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
        Schema::table('features', function($table){
            $table->dropForeign('features_bus_id_foreign');
        });
		Schema::drop('features');
	}

}
