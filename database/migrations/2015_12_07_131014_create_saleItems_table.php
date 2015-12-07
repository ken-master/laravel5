<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function(Blueprint $table){

            $table->increments('id');
            
            $table->float('item_price');
            $table->integer('quantity');
            $table->string('sku',50);
            $table->string('brand',50);
            $table->float('total');
            $table->float('discount');

            $table->timestamps(); //created_at and updated_at collum

            
            
            
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('sales_id')->unsigned();
            $table->foreign('sales_id')->references('id')->on('sales');

            
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sale_items');
    }
}
