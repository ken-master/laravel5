<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();

		//initialize user table seeder
		

		$this->call('PermissionsTableSeeder');

		$this->call('RolesTableSeeder');

		$this->call('UserTableSeeder');

		$this->call('ProductTypeSeeder');
		//you can another seeder class here
		
	}

}
