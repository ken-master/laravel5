<?php
namespace App\Repositories\Product;

use App\Repositories\Product\ProductInterface;
//use App\Repositories\Permission\PermissionInterface;


//Models
use App\Models\Products;



class ProductRepository implements ProductInterface{

	protected $limit = 10;

	protected $product;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( Products $product ){
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

    public function getAll(){

        $products = $this->product->all();

        //$vendor = $this->vendor->all();

        /*foreach($permission as $key => $value){
            dd($value->profile);
        }*/


        return $products;

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
		$product->sku 			= $data['sku'];

		$product->brand 			= $data['brand'];
		$product->barcode 			= $data['barcode'];
		$product->manufacturer_sku 			= $data['manufacturer_sku'];
		$product->price 			= $data['price'];
		$product->price1 			= $data['price1'];
		$product->price2 			= $data['price2'];
		$product->price3			= $data['price3'];
		$product->lower_limit 			= $data['lower_limit'];
		$product->higher_limit 			= $data['higher_limit'];
		$product->description 			= $data['description'];
		
		$product->producttype 	= 1;
		
		$product->save();
		
		if( !empty($data['vendors']) ){
			$product->vendor()->sync( $data['vendors'] );
		}
		return;
		//ALL MIGHTY ->SYNC() is the way of light!
		//return $product->vendor()->sync( $data['vendors'] );
	}

	public function delete($id)
	{	
		$product =  $this->product->find($id);
		return  $product->delete();
	}



}