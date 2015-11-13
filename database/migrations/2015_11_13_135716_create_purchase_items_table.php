<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('purchase_id')->unsigned()->index();
            $table->foreign('purchase_id')->references('id')->on('purchases');

            $table->integer('quantity');
            $table->float('item_price');
            $table->float('item_discount');
            $table->float('total_price');
            $table->float('total_discount');

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
        Schema::drop('purchase_items');
    }
}
