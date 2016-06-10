<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_feature', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->integer('feature_id')->unsigned();
            $table->foreign('bus_id')
                ->references('id')
                ->on('buses')
                ->onDelete('restrict');
            $table->foreign('feature_id')
                ->references('id')
                ->on('features')
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
        Schema::drop('bus_feature');
    }
}
