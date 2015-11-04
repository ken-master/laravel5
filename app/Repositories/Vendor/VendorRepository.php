<?php
namespace App\Repositories\Vendor;

use App\Repositories\Vendor\VendorInterface;
//use App\Repositories\Permission\PermissionInterface;


//Models
use App\Vendor;



class VendorRepository implements VendorInterface{

	protected $limit = 10;

	protected $vendor;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( Vendor $vendor ){
		$this->vendor = $vendor;
		//$this->permission  = $permission;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null){

		$vendor = $this->vendor->with('routes')->paginate($this->limit);

		//$vendor = $this->vendor->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$vendor = $this->vendor->with('routes')->find($id);
		}
		return $vendor;
	
	}

	public function save($data)
	{
		
		$vendor = $this->vendor;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$vendor =	$this->vendor->find($data['id']);
		}

		$vendor->name 			= $data['name'];
		$vendor->description 	= $data['description'];
		
		$vendor->save();
		//ALL MIGHTY ->SYNC() is the way of light!
		return $vendor->permissions()->sync( $data['permission']);
	}

	public function delete($id)
	{	
		$vendor =  $this->vendor->find($id);
		return  $vendor->delete();
	}

}