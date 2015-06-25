<?php namespace App\Repositories\User;



interface UserInterface {


	public function get(int $id = null);

	//public function update();

	public function save(array $data);

	public function delete();

}