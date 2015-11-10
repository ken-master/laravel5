<?php
namespace App\Repositories\Store;

use App\Repositories\Store\StoreInterface;


//Models
use App\Models\Store;



class StoreRepository implements StoreInterface{

	protected $limit = 10;

	protected $store;

	public function __construct( Store $store){
		$this->store  = $store;
	}



	public function get($id = null){

		$store = $this->store->paginate($this->limit);

		if (!is_null($id)){
			$store = $this->store->find($id);
		}
		return $store;
	
	}

	public function save($data)
	{
		
		$store = $this->store;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$store =	$this->store->find($data['id']);
		}

        $store->name 	    	= $data['name'];
        $store->description     = $data['description'];

		$store->save();
		//ALL MIGHTY ->SYNC() is the way of light!
		//return $vendor->addresses()->sync( $data['address_id']);
        return;
	}

	public function delete($id)
	{	
		$store =  $this->store->find($id);
		return  $store->delete();
	}

}