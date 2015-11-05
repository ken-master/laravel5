<?php

use Illuminate\Database\Seeder;


class PermissionsTableSeeder extends Seeder{


	public function run()
	{

		/**
		 *  POPULATE ACCESS LEVEL
		 */
		DB::table('access_levels')->delete();

		$access_level = array([
			'name' 			=> 'Manager',
			'description' 	=> 'This User has Manage Users' 
		]);


		DB::table('access_levels')->insert($access_level);

		/**
		 *  POPULATE ROUTES PERMISSIONS
		 */

		//get routes
		$routes = \Route::getRoutes();

		foreach( $routes as $value ){
			if( !is_null($value->getName()) ){
				$permissions[] = [ 'access_level_id' => 1, 'route_name' => $value->getName()];
			}
		}



		//wipe user tables before seeding
		DB::table('access_level_has_permission')->delete();
		DB::table('access_level_has_permission')->insert($permissions);

	}

}