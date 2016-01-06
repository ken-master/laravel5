<?php

namespace App\Repositories\Sale;



interface SaleInterface {


	public function get($id = null, $paginate = true );

	public function save($data);

	public function delete($id);

}
