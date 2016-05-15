<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('owners', function($table){
            $table->increments('id');
            $table->string('companyname');
            $table->string('ownername');
            $table->string('email');
            $table->text('password');
            $table->string('contact_number');
            $table->string('address');
            $table->boolean('status')->default('1');
            $table->string('remember_token', 100);
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
        Schema::drop('owners');
	}

}
