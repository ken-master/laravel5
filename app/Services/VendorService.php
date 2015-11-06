<?php namespace App\Services;

use App\Repositories\Vendor\VendorRepository;


use Illuminate\Support\Facades\Route;

//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class VendorService{

	protected $vendor;
	

	public function __construct(VendorRepository $vendor)
	{
		$this->vendor = $vendor;
	
	}

	public function get($id = null){
		return $this->vendor->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['vendor_id']) && !empty($data['vendor_id']) ) {
			$vendor['vendor_id'] = $data['vendor_id'];
		}

		$vendor['vendor_name'] 	    = $data['vendor_name'];
        $vendor['vendor_desc'] 	    = $data['vendor_desc'];
		$vendor['phone']		    = $data['phone'];
        $vendor['phone2']		    = $data['phone2'];
        $vendor['mobile']		    = $data['mobile'];
        $vendor['mobile2']		    = $data['mobile2'];
        $vendor['website']		    = $data['website'];
        //$vendor['address_id']		= $data['address_id'];
        $vendor['zipcode_id'] 	    = 1; //$data['zipcode'];
        $vendor['barangay'] 	    = $data['barangay'];
        $vendor['address1']		    = $data['address1'];
        $vendor['address2']		    = $data['address2'];

        return $this->vendor->save($vendor);
	}

	public function delete($id)
	{
		//TO DO:
		// CRAETE FORM HELPER FOR DELETE FORM to pass 
		// HTTP DELETE Protocol
		return $this->vendor->delete($id);
	}

	/**
	 * Get zips
	 * @return Array name.action
	 */
	public function getZip()
	{	
		//
	}

}