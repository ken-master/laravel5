<?php namespace App\Repositories\User;



interface UserInterface {


	public function get($id = null);

	//public function update();

	public function save($data);

	public function delete($id);

}