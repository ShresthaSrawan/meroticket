<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationRoutePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_route_price', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('location_route_a_id')->unsigned();
            $table->integer('location_route_b_id')->unsigned();
            $table->foreign('location_route_a_id')
                ->references('id')
                ->on('location_route')
                ->onDelete('restrict');
            $table->foreign('location_route_b_id')
                ->references('id')
                ->on('location_route')
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
        Schema::drop('location_route_price');
    }
}
