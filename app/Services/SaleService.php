<?php namespace App\Services;

use App\Repositories\Sale\SaleRepository;
//use App\Http\Requests\RegisterSaleRequest;

//use Illuminate\Contracts\Hashing\Hasher as Hash;

//Illuminate Classes|Object|Facades
use Illuminate\Support\Facades\Config;

class SaleService{

	protected $sale;

	public function __construct( SaleRepository $sale  )
	{
		$this->sale = $sale;
	}



	public function get($id = null){
		return $this->sale->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$sale['id'] = $data['id'];
		}

		if ( isset($data['salename']) && !empty($data['salename']) ) {
			$sale['salename'] 		= $data['salename'];
		}

		if ( isset($data['email']) && !empty($data['email']) ) {
			$sale['email']			= $data['email'];
		}

		$sale['password'] 		= \Hash::make($data['password']);
		$sale['role_id'] 		= $data['role'];
		$sale['status_id'] 		= $data['status'];

		$sale['first_name'] 	= $data['first_name'];
		$sale['last_name'] 		= $data['last_name'];
		$sale['middle_name'] 	= $data['middle_name'];

		$sale['department'] 	= $data['department'];
		$sale['division'] 		= $data['division'];
		$sale['section'] 		= $data['section'];
		$sale['posistion'] 		= $data['posistion'];
		$sale['status'] 		= $data['status'];

		//dd( $sale );
		return $this->sale->save($sale);
	}

	public function delete($id)
	{
		//TO DO:
		// CRAETE FORM HELPER FOR DELETE FORM to pass
		// HTTP DELETE Protocol
		$this->sale->delete($id);
	}

	public function getStatuses()
	{
		return Config::get('supplychain.status');

	}
}
