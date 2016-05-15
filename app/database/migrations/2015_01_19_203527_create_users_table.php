<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
           $table->increments('id');
           $table->string('firstName');
           $table->string('lastName');
           $table->string('userName');
           $table->string('email');
           $table->text('password');
           $table->boolean('status');
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
		Schema::drop('users');
	}

}
