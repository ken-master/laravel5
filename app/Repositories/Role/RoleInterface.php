<?php 

namespace App\Repositories\Role;



interface RoleInterface {


	public function get($id = null);

	public function save($data);

	public function delete(int $id);

}