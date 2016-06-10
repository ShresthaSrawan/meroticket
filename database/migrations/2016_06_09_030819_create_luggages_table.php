<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuggagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luggages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            $table->integer('count');
            $table->float('price');
            $table->foreign('type_id')
                ->references('id')
                ->on('luggage_types')
                ->onDelete('restrict');
            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets')
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
        Schema::drop('luggages');
    }
}
