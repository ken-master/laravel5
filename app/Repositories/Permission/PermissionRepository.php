<?php
namespace App\Repositories\Permission;

use App\Repositories\Permission\PermissionInterface;

//Models
use App\Permissions;



class PermissionRepository implements PermissionInterface{


	protected $permission;

	/**
	 *  Permissions
	 */
	public function __construct( Permissions $permission )
	{
		$this->permission = $permission;
	}


	/**
	 * get Permissions by ID if ID is null return ALL
	 * @param  Permission $id [description]
	 * @return Obecjt|Array  Permissions data
	 */
	public function get($id = null)
	{
		$permission = $this->permission->all();

		/*foreach($permission as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$permission = $this->permission->find($id);
		}
		return $permission;
	
	}

}