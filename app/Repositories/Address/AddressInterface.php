<?php 

namespace App\Repositories\Address;



interface AddressInterface {


	public function get($id = null);

	public function save($data);

	public function delete($id);

}