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
			$accessLevel = $this->accessLevel->with('permissions')->find($id);
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
		
		$accessLevel->save();
		//ALL MIGHTY ->SYNC() is the way of light!
		return $accessLevel->permissions()->sync( $data['permission']);
	}

	public function delete(int $id)
	{	
		$accessLevel =  $this->accessLevel->find($id);
		return  $accessLevel->delete($id);
	}

}