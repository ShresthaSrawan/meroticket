<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bus', function($table){

            $table->increments('id');
            $table->string('bus_name');
            $table->integer('owner_id')->unsigned();
            $table->string('bus_number');
            $table->text('description');
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('owner');

        });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

        Schema::table('bus', function($table){
            $table->dropForeign('bus_owner_id_foreign');
        });

        Schema::drop('bus');
	}

}
