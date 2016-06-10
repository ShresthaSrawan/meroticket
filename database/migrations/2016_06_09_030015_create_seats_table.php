<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('bus_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('bus_id')
                ->references('id')
                ->on('buses')
                ->onDelete('restrict');
            $table->foreign('type_id')
                ->references('id')
                ->on('seat_types')
                ->onDelete('restrict');
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
        Schema::drop('seats');
    }
}
