<?php namespace App\Services;

use App\Repositories\Vendor\VendorRepository;


use Illuminate\Support\Facades\Route;

//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class StoreService{

	protected $store;
	

	public function __construct(VendorRepository $store)
	{
		$this->store = $store;
	
	}

	public function get($id = null){
		return $this->store->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$vendor['id'] = $data['id'];
		}

		$vendor['name'] 	        = $data['name'];
        $vendor['description'] 	    = $data['description'];

        return $this->store->save($vendor);
	}

	public function delete($id)
	{
		//TO DO:
		// CRAETE FORM HELPER FOR DELETE FORM to pass 
		// HTTP DELETE Protocol
		return $this->store->delete($id);
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