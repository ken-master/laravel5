<?php namespace App\Services;

use App\Repositories\Vendor\VendorRepository;


use Illuminate\Support\Facades\Route;


//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class VendorService{

	protected $vendor;
	

	public function __construct( VendorRepository $vendor)
	{
		$this->vendor = $vendor;
	
	}



	public function get($id = null){
		return $this->vendor->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$vendor['id'] = $data['id'];
		}
		
	
	
		$vendor['name'] 			= $data['name'];
		$vendor['description'] 	    = $data['description'];
		$vendor['permission']		= $data['permission'];

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
	 * Get current Listed Route Names
	 * @return Array name.action
	 */
	public function getRouteList()
	{	
		$routes = Route::getRoutes();

		foreach( $routes as $value ){
			if( !is_null($value->getName()) ){
				$r[] = $value->getName();
			}
		}

		return $r ;
	}

}