<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zipcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country', 2);
            $table->string('major_area', 255);
            $table->string('zip_code',25);
            $table->string('city', 255);
            $table->index('major_area');
            $table->index('zip_code');
            $table->index('city');
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
        Schema::drop('zipcodes');
    }
}
