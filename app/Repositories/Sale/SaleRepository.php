<?php
namespace App\Repositories\Sale;

use App\Repositories\Sale\SaleInterface;
//use App\Repositories\Sale\SaleItems;
//use App\Repositories\Permission\PermissionInterface;


//Models
use App\Models\Sales;
use App\Models\SaleItems;

class SaleRepository implements SaleInterface{

	protected $limit = 10;

	protected $sale;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( Sales $sale ){
		$this->sale = $sale;
		//$this->permission  = $permission;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null, $paginate = true){

		if( $paginate ){
			$sale = $this->sale->paginate($this->limit);
		}else{
			$sale = $this->sale->all();
		}


		//$sale = $this->sale->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$sale = $this->sale->with('saleItems')->find($id);
		}
		return $sale;

	}

	public function save($data)
	{
		//dd($data);
		$sale = $this->sale;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$sale =	$this->sale->find( $data['id']);
			//there is no SYNC in one-to-many
			//delete them ALL, WIPE THEM ALL! KILL THEM ALL! PURGE THEM ALL!
			//$sale->accessLevel()->delete();
		}

		$sale->total_total 			= $data['total'];
		$sale->total_subtotal 	= $data['sub_total'];
		$sale->total_tax 				= $data['tax'];
		$sale->total_discount 	= $data['discount'];
		$sale->user_id 					= \Auth::user()->id;
		$sale->save();
//	dd($data);
		$saleItems = [];
		foreach ($data['products'] as  $value) {

			$saleItems[] = new SaleItems([
				'item_price' 	=> $value['item_price'],
				'quantity' 		=> $value['item']['qty'],
				'sku' 				=> $value['item']['sku'],
				'brand' 			=> $value['item']['brand'],
				'total' 			=> $value['total_item_price'],
				'discount' 		=> $value['discount'],
				'product_id' 	=> $value['product_id'],

			]);
		}
		$sale->saleItems()->saveMany($saleItems);
		return $sale;

		/*$access_level = [];
		foreach ($data['access_level'] as $key => $value) {
			$access_level[] = new SaleHasAccessLevel( ['sales_id' => $sale->id ], ['access_level_id' => $value] );
		}*/

		//return $sale->accessLevel()->saveMany( $access_level );
		//ALL MIGHTY ->SYNC() is the way of light!
		//return $sale->accessLevel()->sync( $data['access_level'] );
	}

	public function delete($id)
	{

		$sale =  $this->sale->find($id);
		return  $sale->delete();
	}

}
