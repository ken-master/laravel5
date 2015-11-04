<?php 

namespace App\Repositories\Vendor;



interface VendorInterface {


	public function get($id = null);

	public function save($data);

	public function delete($id);

}