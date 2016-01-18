<?php
namespace App\Repositories\Sale;

use App\Repositories\Sale\SaleInterface;


//Models
use App\Models\SaleItems;


class saleItemsRepository implements SaleInterface{

	protected $limit = 10;

	protected $saleItems;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( SaleItems $saleItems ){
		$this->saleItems = $saleItems;
		//$this->permission  = $permission;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null, $paginate = true){

		if( $paginate ){
			$saleItems = $this->saleItems->paginate($this->limit);
		}else{
			$saleItems = $this->saleItems->all();
		}


		//$saleItems = $this->saleItems->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$saleItems = $this->saleItems->with('accessLevel')->find($id);
		}
		return $saleItems;

	}

	public function save($data)
	{
		//dd($data);
		$saleItems = $this->saleItems;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$saleItems =	$this->saleItems->find( $data['id']);
			//there is no SYNC in one-to-many
			//delete them ALL, WIPE THEM ALL! KILL THEM ALL! PURGE THEM ALL!
			//$saleItems->accessLevel()->delete();
		}

	// foreach ($data['products'] as  $value) {
	//
	// 	$saleItems[]->item_price 		= $value['item_price'];
	// 	$saleItems[]->quantity 			= $value['item']['qty'];
	// 	$saleItems[]->sku 					= $value['item']['sku'];
	// 	$saleItems[]->brand 				= $value['item']['brand'];
	// 	$saleItems[]->total 				= $value['total_item_price'];
	// 	$saleItems[]->discount 			= $value['discount'];
	// 	$saleItems[]->product_id 		= $value['product_id'];
	// 	$saleItems[]->sales_id 			= $data['sale_id'];
	//
	// }


		return $saleItems->save();

		/*$access_level = [];
		foreach ($data['access_level'] as $key => $value) {
			$access_level[] = new saleItemsHasAccessLevel( ['saleItemss_id' => $saleItems->id ], ['access_level_id' => $value] );
		}*/

		//return $saleItems->accessLevel()->saveMany( $access_level );
		//ALL MIGHTY ->SYNC() is the way of light!
		//return $saleItems->accessLevel()->sync( $data['access_level'] );
	}

	public function delete($id)
	{
		$saleItems =  $this->saleItems->find($id);
		return  $saleItems->delete();
	}

}
