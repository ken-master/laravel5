<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->int('user_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('middle_name');
			$table->string('suffix');
			$table->date('dob');
			$table->string('phone');
			$table->string('division');
			$table->string('department');
			$table->string('section');
			$table->string('posistion');
			$table->timestamps();

			//set foreign keys
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_profiles');
	}

}
