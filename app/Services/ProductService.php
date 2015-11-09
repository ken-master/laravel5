<?php 

namespace App\Services;

use App\Repositories\Product\ProductRepository;

use Illuminate\Support\Facades\Route;


//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class ProductService{

	protected $product;
	
	

	public function __construct( ProductRepository $product)
	{
		$this->product = $product;
		
	}



	public function get($id = null){
		return $this->product->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$product['id'] = $data['id'];
		}
		
	
	
		$product['name'] 			= $data['name'];
		$product['description'] 	= $data['description'];
		$product['permission']		= $data['permission'];

		return $this->product->save($product);
	}

	public function delete($id)
	{
		//TO DO:
		// CRAETE FORM HELPER FOR DELETE FORM to pass 
		// HTTP DELETE Protocol
		return $this->product->delete($id);
	}

	

}