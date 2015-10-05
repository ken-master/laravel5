<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesHasAccessLevelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles_has_access_level', function(Blueprint $table)
		{

			//$table->integer('roles_id');
			//$table->integer('access_level_id');

			//set foreign keys
			$table->integer('roles_id')->unsigned()->index();
			$table->foreign('roles_id')->references('id')->on('roles');

			//set foreign keys
			$table->integer('access_level_id')->unsigned()->index();
			$table->foreign('access_level_id')->references('id')->on('access_levels');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles_has_access_level');
	}

}
