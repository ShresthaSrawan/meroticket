<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feature', function(Blueprint $table)
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
        Schema::table('feature', function($table){
            $table->dropForeign('feature_bus_id_foreign');
        });
		Schema::drop('feature');
	}

}
