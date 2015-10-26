<?php
namespace App\Repositories\Role;

use App\Repositories\Role\RoleInterface;
//use App\Repositories\Permission\PermissionInterface;


//Models
use App\Roles;
use App\RoleHasAccessLevel;


class RoleRepository implements RoleInterface{

	protected $limit = 10;

	protected $role;
	//protected $permissions;

	/**
	 *  Permissions
	 */
	public function __construct( Roles $role ){
		$this->role = $role;
		//$this->permission  = $permission;
	}


	/**
	 * get Access Level by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Access Level data
	 */
	public function get($id = null){

		$role = $this->role->with('accessLevel')->paginate($this->limit);

		//$role = $this->role->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$role = $this->role->with('accessLevel')->find($id);
		}
		return $role;
	
	}

	public function save($data)
	{
		//dd($data);
		$role = $this->role;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$role =	$this->role->find( $data['id']);
			//there is no SYNC in one-to-many
			//delete them ALL, WIPE THEM ALL! KILL THEM ALL! PURGE THEM ALL!
			//$role->accessLevel()->delete();
		}

		$role->name 		= $data['name'];
		$role->description 	= $data['description'];
		$role->save();
		
		/*$access_level = [];
		foreach ($data['access_level'] as $key => $value) {
			$access_level[] = new RoleHasAccessLevel( ['roles_id' => $role->id ], ['access_level_id' => $value] );
		}*/

		//return $role->accessLevel()->saveMany( $access_level );
		//ALL MIGHTY ->SYNC() is the way of light!
		return $role->accessLevel()->sync( $data['access_level'] );
	}

	public function delete(int $id)
	{	
		$role =  $this->role->find($id);
		return  $role->delete($id);
	}

}