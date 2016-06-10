<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code')->unique();
            $table->integer('trip_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('seat_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->integer('from_location_id')->unsigned();
            $table->integer('to_location_id')->unsigned();
            $table->float('price');
            $table->foreign('trip_id')
                ->references('id')
                ->on('trips')
                ->onDelete('restrict');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
            $table->foreign('seat_id')
                ->references('id')
                ->on('seats')
                ->onDelete('restrict');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('restrict');
            $table->foreign('from_location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('restrict');
            $table->foreign('to_location_id')
                ->references('id')
                ->on('locations')
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
        Schema::drop('tickets');
    }
}
