<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusRouteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bus_route', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->integer('route_id')->unsigned();
            $table->date('date');
            $table->foreign('bus_id')
				->references('id')
				->on('buses');
            $table->foreign('route_id')
				->references('id')
				->on('routes');
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
        Schema::table('bus_route', function($table){
            $table->dropForeign('bus_route_bus_id_foreign');
            $table->dropForeign('bus_route_route_id_foreign');
        });

		Schema::drop('bus_route');
	}

}
