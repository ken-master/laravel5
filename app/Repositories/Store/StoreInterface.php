<?php 

namespace App\Repositories\Store;



interface StoreInterface {


	public function get($id = null);

	public function save($data);

	public function delete($id);

}