<?php namespace App\Services;

use App\Repositories\Sale\SaleRepository;
use App\Repositories\Sale\SaleItemsRepository;
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
	public function __construct( SaleRepository $sale,SaleItemsRepository $saleItems, ProductRepository $product  )
	{
		$this->sale = $sale;
		$this->product = $product;
		$this->saleItems = $saleItems;
	}


	/**
	 * Get Sale item by id
	 * @param  int $id default null
	 * @return object  Sale's object
	 */
	public function get($id = null){
		$data = $this->sale->get($id);
		$items = [];

		if($id != null){

			$product_id = array_pluck( $data->saleItems->toArray(), 'product_id');
			$products = $this->product->get($product_id)->toArray();
			
			foreach ($data->saleItems->toArray() as $saleItem) {
				foreach ($products as  $product) {
						if($saleItem['product_id'] == $product['id']){
							$items[] = array_merge($saleItem,$product);
						}
				}
				//break;
			}
		}
		return ['data' => $data, 'products' => $items];
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

		//save sales first
		$sales =	$this->calculateSale($data['items']);
		$sales = collect($sales);
		$sales = $sales->toArray();

		//insertion of sales items happens in SaleRepository
		return $this->sale->save($sales);
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
		$d = [];
		//convert to array, somehow ->toArray() method is not working
		foreach ($data as $key => $value) {
			$d[] = (array) $value;
		}
		$pid = array_pluck($d,'id');

		//get products by ids
		$products = $this->product->get($pid)->toArray();

		//add qty to the array for computation
		$p = [];
		$product_item = [];
		foreach ($products as $product_value){
			foreach ($d as $d_key => $d_value) {
				if($product_value['id'] == $d_value['id']){
					$product_item[] = array_add($product_value, 'qty', $d_value['qty']);
					//$product_item[] = array_add($product_value, 'total_price', $d_value['total_item_price']);
				}
			}
			//break;
		}
		$results = LibSales::calculate($product_item);

		return $results;
	}



}
