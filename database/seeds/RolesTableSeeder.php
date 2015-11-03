<?php

use Illuminate\Database\Seeder;


class RolesTableSeeder extends Seeder{


	public function run()
	{

		/**
		 *  POPULATE ACCESS LEVEL
		 */
		DB::table('roles')->delete();

		$roles = array(
			'name' 			=> 'Super Admin',
			'description' 	=> 'Super Admin Role' 
		);


		$roleId = DB::table('roles')->insertGetId($roles);

		/**
		 *  POPULATE ROUTES PERMISSIONS
		 */
		
		//wipe user tables before seeding
		DB::table('roles_has_access_level')->delete();

		$roleHasAccessLevel = array(
			'roles_id' => $roleId,
			'access_level_id' => 1,
		);

		DB::table('roles_has_access_level')->insert($roleHasAccessLevel);

	}

}