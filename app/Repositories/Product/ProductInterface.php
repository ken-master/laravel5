<?php 

namespace App\Repositories\Product;



interface ProductInterface {


	public function get($id = null);

	public function save($data);

	public function delete($id);

}