<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder{


	public function run()
	{

		//wipe user tables before seeding
		DB::table('users')->delete();

		//create  users
		$user = array( 
			['first_name' => 'Admin', 'last_name' => 'istrator', 'email' => 'admin@admin.com', 'password' => \Hash::make('password')],
			['first_name' => 'Ken', 'last_name' => 'Master', 'email' => 'kenn@ken.com', 'password' => \Hash::make('password')],
			['first_name' => 'Rankin', 'last_name' => 'Dela Rama', 'email' => 'kendelarama@gmail.com', 'password' => \Hash::make('password')],
			['first_name' => 'User1', 'last_name' => 'Surname 1', 'email' => 'user1@test.com', 'password' => \Hash::make('password')],
			['first_name' => 'User2', 'last_name' => 'Surname 2', 'email' => 'user2@test.com', 'password' => \Hash::make('password')],
		);



		$userId = DB::table('users')->insert($user);

		//$userId;

		/**
		 * TO DO
		 *	
		 *	- get user id
		 *	- seed profile table base on id
		 */
	}

}