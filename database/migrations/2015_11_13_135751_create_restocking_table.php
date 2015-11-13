<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestockingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restocking', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('purchase_item_id')->unsigned()->index();

            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('id')->on('stores');

            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products');

            $table->date('restocking_date');
            $table->integer('quantity');

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
        Schema::drop('restocking');
    }
}
