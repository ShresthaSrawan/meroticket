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
		Schema::create('users', function($usersTable){
           $usersTable->increments('id');
           $usersTable->string('firstName');
           $usersTable->string('lastName');
           $usersTable->string('email');
           $usersTable->text('password');
           $usersTable->boolean('admin')->default(0);
           $usersTable->string('remember_token', 100);
           $usersTable->timestamps();
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
