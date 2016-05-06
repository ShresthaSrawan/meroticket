<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seats', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('fs');
            $table->integer('a');
            $table->integer('b');
            $table->integer('bs');
            $table->integer('bus_id')->unsigned();
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
        Schema::table('seats', function($table){
            $table->dropForeign('seats_bus_id_foreign');
        });
		Schema::drop('seats');
	}

}
