<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessLevelHasPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('access_level_has_permission', function(Blueprint $table)
		{
			
			$table->integer('access_level_id');
			$table->integer('permissions_id');

			//set foreign keys
			$table->integer('access_level_id')->unsigned();
			$table->foreign('access_level_id')->references('id')->on('access_level');

			//set foreign keys
			$table->integer('permissions_id')->unsigned();
			$table->foreign('permissions_id')->references('id')->on('permissions_id');

			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('access_level_has_permission');
	}

}
