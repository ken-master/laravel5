<?php
namespace App\Repositories\Product;

use App\Repositories\Product\ProductInterface;
//use App\Repositories\Permission\PermissionInterface;


//Models
use App\Models\Product;



class ProductRepository implements ProductInterface{

	protected $limit = 10;

	protected $product;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( Product $product ){
		$this->product = $product;
		//$this->permission  = $permission;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null){

		$product = $this->product->with('vendor')->paginate($this->limit);

		//$product = $this->product->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$product = $this->product->with('vendor')->find($id);
		}
		return $product;
	
	}

	public function save($data)
	{
		
		$product = $this->product;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$product =	$this->product->find($data['id']);
		}

		$product->name 			= $data['name'];
		$product->description 	= $data['description'];
		
		$product->save();
		//ALL MIGHTY ->SYNC() is the way of light!
		return $product->permissions()->sync( $data['permission']);
	}

	public function delete($id)
	{	
		$product =  $this->product->find($id);
		return  $product->delete();
	}

}