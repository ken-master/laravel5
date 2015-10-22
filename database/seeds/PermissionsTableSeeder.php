<?php

use Illuminate\Database\Seeder;


class PermissionsTableSeeder extends Seeder{


	public function run()
	{

		//wipe user tables before seeding
		DB::table('permissions')->delete();

		//create  users
		$permissions = array( 

			['name' => 'create', 'description'=> 'A user can Create'],
			['name' => 'update', 'description'=> 'A user can Update'],
			['name' => 'show', 'description'=> 'A user can Access'],
			['name' => 'destroy', 'description'=> 'A user can Delete']

			/*['first_name' => 'Admin', 'last_name' => 'istrator', 'email' => 'admin@admin.com', 'password' => \Hash::make('password')],
			['first_name' => 'Ken', 'last_name' => 'Master', 'email' => 'kenn@ken.com', 'password' => \Hash::make('password')],
			['first_name' => 'Rankin', 'last_name' => 'Dela Rama', 'email' => 'kendelarama@gmail.com', 'password' => \Hash::make('password')],
			['first_name' => 'User1', 'last_name' => 'Surname 1', 'email' => 'user1@test.com', 'password' => \Hash::make('password')],
			['first_name' => 'User2', 'last_name' => 'Surname 2', 'email' => 'user2@test.com', 'password' => \Hash::make('password')],*/
		);



		DB::table('permissions')->insert($permissions);

	}

}