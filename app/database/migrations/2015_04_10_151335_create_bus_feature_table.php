<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusFeatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bus_feature', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('feature_id')->unsigned();
			$table->integer('bus_id')->unsigned();
			$table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
			$table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
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
		Schema::table('bus_feature', function(Blueprint $table)
		{
			$table->dropforeign('bus_feature_feature_id_foreign');
			$table->dropforeign('bus_feature_bus_id_foreign');
		});

		Schema::drop('bus_feature');
	}

}
