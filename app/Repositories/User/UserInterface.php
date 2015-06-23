<?php namespace App\Repositories\User;



interface UserInterface {


	public function get();

	//public function update();

	public function save(array $data);

	//public function delete();

}