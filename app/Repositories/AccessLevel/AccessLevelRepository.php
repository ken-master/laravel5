<?php
namespace App\Repositories\AccessLevel;

use App\Repositories\AccessLevel\AccessLevelInterface;
//use App\Repositories\Permission\PermissionInterface;


//Models
use App\AccessLevel;



class AccessLevelRepository implements AccessLevelInterface{

	protected $limit = 10;

	protected $accessLevel;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( AccessLevel $accessLevel ){
		$this->accessLevel = $accessLevel;
		//$this->permission  = $permission;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null){

		$accessLevel = $this->accessLevel->with('permissions')->paginate($this->limit);

		//$accessLevel = $this->accessLevel->all();

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
		
		$accessLevel = $this->accessLevel;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$accessLevel =	$this->accessLevel->find($data['id']);
		}

		$accessLevel->name 			= $data['name'];
		$accessLevel->description 	= $data['description'];
		
		//insert to pivot table
		

		$accessLevel->save();

		return $accessLevel->permissions()->attach( $data['permission']);

		
		// $al->permissions()->attach( [ 6,7  ]);
		//return false;
	}

	public function delete(int $id)
	{
		return false;
	}

}