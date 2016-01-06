<?php
namespace App\Repositories\Sale;

use App\Repositories\Sale\SaleInterface;
//use App\Repositories\Permission\PermissionInterface;


//Models
use App\Models\Sales;


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
			$sale = $this->sale->with('accessLevel')->find($id);
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

		$sale->name 		= $data['name'];
		$sale->description 	= $data['description'];
		return $sale->save();

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
