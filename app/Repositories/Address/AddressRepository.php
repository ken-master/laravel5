<?php
namespace App\Repositories\Address;

use App\Repositories\Address\AddressInterface;


//Models
use App\Address;



class AddressRepository implements AddressInterface{

	protected $limit = 10;

	protected $address;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( Address $address ){
		$this->address = $address;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null){

		$address = $this->address->with('routes')->paginate($this->limit);

		//$address = $this->address->all();



		if (!is_null($id)){
			$address = $this->address->with('routes')->find($id);
		}
		return $address;
	
	}

	public function save($data)
	{
		
		$address = $this->address;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$address =	$this->address->find($data['id']);
		}

		$address->zipcode_id 		= $data['zipcode_id'];
        $address->barangay 	        = $data['barangay'];
        $address->address1	        = $data['address1'];
        $address->address2	        = $data['address2'];

		$address->save();
		//ALL MIGHTY ->SYNC() is the way of light!
		return; // $address->addresses()->sync( $data['address_id']);
	}

	public function delete($id)
	{	
		$address =  $this->address->find($id);
		return  $address->delete();
	}

}