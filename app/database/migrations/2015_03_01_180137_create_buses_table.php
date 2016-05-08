<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buses', function($table){

            $table->increments('id');
            $table->string('name');
            $table->integer('owner_id')->unsigned();
            $table->string('number');
            $table->text('description');
            $table->timestamps();
            $table->foreign('owner_id')
				->references('id')
				->on('owner');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('buses', function($table){
            $table->dropForeign('buses_owner_id_foreign');
        });

        Schema::drop('buses');
	}
}
