<?php
namespace App\Repositories\AccessLevel;

use App\Repositories\AccessLevel\AccessLevelInterface;

//Models
use App\AccessLevel;



class AccessLevelRepository implements AccessLevelInterface{


	protected $accessLevel;

	/**
	 *  Permissions
	 */
	public function __construct( AccessLevel $accessLevel ){
		$this->accessLevel = $accessLevel;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null){
		$accessLevel = $this->accessLevel->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$accessLevel = $this->accessLevel->find($id);
		}
		return $accessLevel;
	
	}

	public function save($data)
	{

		// $al->permissions()->attach( [ 6,7  ]);
		return false;
	}

	public function delete(int $id)
	{
		return false;
	}

}