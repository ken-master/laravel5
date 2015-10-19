<?php 
namespace App\Services;


use App\Repositories\Permission\PermissionRepository;

/**
 *  PERMISSION SERVICE 
 */
class PermissionService{

	protected $permission;

	public function __construct( PermissionRepository $permission )
	{

		$this->permission = $permission;
	}


	public function get($id = null)
	{
		return $this->permission->get($id);
	}

}