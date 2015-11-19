<?php
namespace App\Repositories\Vendor;

use App\Repositories\Vendor\VendorInterface;
//use App\Repositories\Permission\PermissionInterface;


//Models
use App\Models\Vendor, App\Models\Address;



class VendorRepository implements VendorInterface{

	protected $limit = 10;

	protected $vendor;
    protected $address;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( Vendor $vendor, Address $address){
		$this->vendor  = $vendor;
        $this->address = $address;
		//$this->permission  = $permission;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null){

		$vendor = $this->vendor->with('address')->paginate($this->limit);

		//$vendor = $this->vendor->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$vendor = $this->vendor->with('address')->find($id);
		}
		return $vendor;
	
	}


	public function getAll(){

		$vendor = $this->vendor->all();

		//$vendor = $this->vendor->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		
		return $vendor;
	
	}



	public function save($data)
	{
		
		$vendor = $this->vendor;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$vendor =	$this->vendor->find($data['id']);
		}


		$vendor->vendor_name 		= $data['vendor_name'];
		$vendor->vendor_desc 	    = $data['vendor_desc'];
		$vendor->phone	    	    = $data['phone'];
        $vendor->phone2		        = $data['phone2'];
        $vendor->mobile		        = $data['mobile'];
        $vendor->mobile2		    = $data['mobile2'];
        $vendor->website		    = $data['website'];
        //$vendor->address_id         = $address->id;

		$vendor->save();


        //User Profiles
        $address = $this->address;

       // if (isset($vendor['address_id'])) {
        if( !is_null( $this->address->where('vendor_id',$vendor->id)->first() ) ){
                $address = $this->address->where('id',$vendor->id)->first();
        }
      //  }

        //insert UserProfiles
        $address->zipcode 			= $data['zipcode'];
        $address->barangay       	= $data['barangay'];
        $address->address1       	= $data['address1'];
        $address->address2       	= $data['address2'];
        $address->vendor_id       	= $vendor->id;

        return $address->save();


		
		//ALL MIGHTY ->SYNC() is the way of light!
		//return $vendor->addresses()->sync( $data['address_id']);
       
	}

	public function delete($id)
	{	
		$vendor =  $this->vendor->find($id);
		return  $vendor->delete();
	}


	public function getProductsByVendorId($vendorId){
		return $this->vendor->with('product')->find($vendorId);
	}

	public function productNotBelongsToVendor($vendorId)
	{	
		//i use first(), becuase the data colected is/are in pivot and associating it to vendor.
		//since it's a pivot table. there would be a chance but
		return $this->vendor->with('product')
				->where( 'id', '!=', $vendorId)
				//->where( 'product_id', '!=', $prductId)
				->first();
	}
}