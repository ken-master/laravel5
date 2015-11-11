<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 225);
            $table->string('sku', 50);
            $table->string('brand', 225);
            $table->string('barcode', 100);
            $table->string('manufacturer_sku', 50);
            $table->float('price');
            $table->float('price1');
            $table->float('price2');
            $table->float('price3');
            $table->text('description');

            $table->integer('lower_limit')->default(0);
            $table->integer('higher_limit')->default(0);


            $table->unsignedInteger('producttype');
            $table->foreign('producttype')->references('id')->on('producttype');
            $table->index('sku');
            $table->index('brand');
            $table->index('barcode');
            $table->index('manufacturer_sku');
            $table->timestamps();
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
        Schema::drop('products');
    }
}
