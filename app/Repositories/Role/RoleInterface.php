<?php 

namespace App\Repositories\Role;



interface RoleInterface {


	public function get($id = null, $paginate = true );

	public function save($data);

	public function delete($id);

}