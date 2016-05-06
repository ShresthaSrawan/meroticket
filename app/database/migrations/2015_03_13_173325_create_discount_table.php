<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discounts', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->integer('student');
            $table->integer('kids');
            $table->integer('old');
			$table->integer('other');
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
        Schema::table('discounts', function($table){
            $table->dropForeign('discounts_bus_id_foreign');
        });

		Schema::drop('discounts');
	}

}
