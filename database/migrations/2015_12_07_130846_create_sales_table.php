<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function(Blueprint $table)
        {

            $table->increments('id');
            
            $table->integer('location_id');

            $table->timestamp('trans_date');

            $table->float('total_total');
            $table->float('total_subtotal');
            $table->float('total_tax');
            $table->float('total_discount');
            
            $table->float('points_earned');

            $table->timestamps(); //created_at and updated_at collum


            $table->integer('member_id');
            //$table->foreign('member_id')->references('id')->on('members');

            //set foreign keys
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

        
            
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
        Schema::drop('sales');
    }
}
