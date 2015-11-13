<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vendor_id')->unsigned()->index();
            $table->foreign('vendor_id')->references('id')->on('vendors');

            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('id')->on('stores');

            $table->date('transdate');
            $table->float('total_total');
            $table->float('total_subtotal');
            $table->float('total_tax');
            $table->float('total_discount');
            $table->string('invoice_number',100);

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
        Schema::drop('purchases');
    }
}
