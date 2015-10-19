<?php 

namespace App\Repositories\AccessLevel;



interface AccessLevelInterface {


	public function get($id = null);

	public function save($data);

	public function delete(int $id);

}