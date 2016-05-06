<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discount', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->integer('student');
            $table->integer('kids');
            $table->integer('old');
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
        Schema::table('discount', function($table){
            $table->dropForeign('discount_bus_id_foreign');
        });

		Schema::drop('discount');
	}

}
