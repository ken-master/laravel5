<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('vendor_name', 255);
            $table->text('vendor_desc');
            $table->string('phone', 20);
            $table->string('phone2', 20);
            $table->string('mobile', 20);
            $table->string('mobile2', 20);
            $table->string('fax', 20);
            $table->string('email', 100);
            $table->unsignedInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->string('website', 255);
            $table->timestamps();
            $table->index('vendor_name');
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
        Schema::drop('vendors');
    }
}
