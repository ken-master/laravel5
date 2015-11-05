<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder{


	public function run()
	{

		//wipe user tables before seeding
		DB::table('users')->delete();

		//create  users
		$user = array( 
			'username' => 'admin',
			'email' => 'admin@admin.com',
			'password' => \Hash::make('password1q2w'),
			'roles_id' => 0,
			'is_superadmin' => 1,
			'status' => 'active',
			
		);

		$userId = DB::table('users')->insertGetId($user);

		

		/**
		 *  PROFILES 
		 */
		DB::table('user_profiles')->delete();
		$profiles = array( 
			'first_name' => 'Super',
			'last_name' => 'Administrator',
			'middle_name' => 'Danger',
			'user_id' => $userId,
		);
		DB::table('user_profiles')->insert($profiles);
		//$userId;

		/**
		 * TO DO
		 *	
		 *	- get user id
		 *	- seed profile table base on id
		 */
	}

}