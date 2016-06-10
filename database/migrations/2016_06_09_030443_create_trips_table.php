<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('route_id')->unsigned();
            $table->integer('bus_id')->unsigned();
            $table->dateTime('leaves_on');
            $table->dateTime('reaches_on');
            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
                ->onDelete('restrict');
            $table->foreign('bus_id')
                ->references('id')
                ->on('buses')
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
        Schema::drop('trips');
    }
}
