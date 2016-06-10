<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_route', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('location_id')->unsigned();
            $table->integer('route_id')->unsigned();
            $table->integer('order');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('restrict');
            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
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
        Schema::drop('location_route');
    }
}
