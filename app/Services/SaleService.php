<?php namespace App\Services;

use App\Repositories\Sale\SaleRepository;
use App\Repositories\Product\ProductRepository;
//use Illuminate\Contracts\Hashing\Hasher as Hash;

//Illuminate Classes|Object|Facades
use Illuminate\Support\Facades\Config;


//library
use App\Libraries\Sales as LibSales;

class SaleService{

	protected $sale;

	/**
	 * Initialize Repositories and other stuff
	 * @param SaleRepository    $sale    SaleRepository
	 * @param ProductRepository $product ProductRepository
	 */
	public function __construct( SaleRepository $sale, ProductRepository $product  )
	{
		$this->sale = $sale;
		$this->product = $product;
	}


	/**
	 * Get Sale item by id
	 * @param  int $id default null
	 * @return object  Sale's object
	 */
	public function get($id = null){
		return $this->sale->get($id);
	}


	/**
	 * Save Sales
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$sale['id'] = $data['id'];
		}

		//dd( $sale );
		return $this->sale->save($sale);
	}

	/**
	 * Save ProductsItems
	 * @param  Array $data [description]
	 * @return Array       [description]
	 */
	public function saveProductsItems($data)
	{
		# code...
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id)
	{
		//TO DO:
		// CRAETE FORM HELPER FOR DELETE FORM to pass
		// HTTP DELETE Protocol
		$this->sale->delete($id);
	}
	/**
	 * [getStatuses description]
	 * @return [type] [description]
	 */
	public function getStatuses()
	{
		return Config::get('supplychain.status');

	}

	/**
	 * get products and calculate
	 * @param  JSON $data should be json encoded object
	 * @return [type]       [description]
	 */
	public function calculateSale($data)
	{
		//get products and prices
		$data = array_flatten(json_decode($data));

		//convert to array, somehow ->toArray() method is not working
		foreach ($data as $key => $value) {
			$d[] = (array) $value;
		}
		$pid = array_pluck($d,'id');

		//get products by ids
		$products = $this->product->get($pid)->toArray();

		//add qty to the array for computation
		$p = array();
		foreach ($products as $product_value){
			foreach ($d as $d_key => $d_value) {
				if($product_value['id'] == $d_value['id']){
					$product_item[] = array_add($product_value, 'qty', $d_value['qty']);
				}
			}
			//break;
		}
		$results = LibSales::calculate($product_item);
		return json_encode($results);
	}



}
