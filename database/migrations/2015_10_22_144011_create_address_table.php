<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
           // $table->unsignedInteger('zipcode_id');
            //$table->foreign('zipcode_id')->references('id')->on('zipcodes');
            $table->string('barangay', 255);
            $table->string('address1', 255);
            $table->string('address2', 255);
            $table->string('zipcode',25);
            $table->timestamps();
           // $table->index('zipcode_id');
            $table->index('zipcode');
            $table->index('barangay');
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
        Schema::drop('addresses');
    }
}
