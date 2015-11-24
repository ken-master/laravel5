<?php namespace App\Services;

use App\Repositories\Store\StoreRepository;


use Illuminate\Support\Facades\Route;

//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class StoreService{

	protected $store;
	

	public function __construct(StoreRepository $store)
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
			$store['id'] = $data['id'];
		}

        if(!empty($data['products'])){
            $product['products']				= $data['products'];

        }

		$store['name'] 	        = $data['name'];
        $store['description'] 	= $data['description'];

        return $this->store->save($store);
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

    /**
     * Get getProductsByVendorId
     * @return Array
     */
    public function getProductsByStoreId($id)
    {
        return $this->product->getProductsByStoreId($id);
    }

    public function getAllProductNotStore($storeId)
    {
        return $this->product->productNotBelongsToStore($storeId);
    }

}