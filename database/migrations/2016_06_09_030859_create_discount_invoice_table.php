<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_invoice', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('discount_type_id')->unsigned();
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('restrict');
            $table->foreign('discount_type_id')
                ->references('id')
                ->on('discount_types')
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
        Schema::drop('discount_invoice');
    }
}
