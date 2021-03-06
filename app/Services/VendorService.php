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

	public function getAll(){
		return $this->vendor->getAll();
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$vendor['id'] = $data['id'];
		}

		$vendor['vendor_name'] 	    = $data['vendor_name'];
        $vendor['vendor_desc'] 	    = $data['vendor_desc'];
		$vendor['phone']		    = $data['phone'];
        $vendor['phone2']		    = $data['phone2'];
        $vendor['mobile']		    = $data['mobile'];
        $vendor['mobile2']		    = $data['mobile2'];
        $vendor['website']		    = $data['website'];
        //$vendor['address_id']		= $data['address_id'];
        $vendor['zipcode'] 	    	= $data['zipcode'];
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
	 * Get getProductsByVendorId
	 * @return Array 
	 */
	public function getProductsByVendorId($id)
	{	
		return $this->vendor->getProductsByVendorId($id);
	}

	public function getAllProductNotVendor($vendorId)
	{
		return $this->vendor->productNotBelongsToVendor($vendorId);
	}


	public function removeProductsToVendor($data)
	{
        return $this->vendor->removeProductsToVendor($data);
	}

	public function assignProductsToVendor($data)
	{
		return $this->vendor->assignProductsToVendor($data);
	}
}