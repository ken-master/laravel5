<?php namespace App\Services;

use App\Repositories\Role\RoleRepository;
//use App\Repositories\AccessLevel\AccessLevelRepository;

//use Illuminate\Support\Facades\Route;


//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class RoleService{

	protected $role;
	//protected $accessLevel;

	public function __construct( RoleRepository $role)
	{
		$this->role = $role;
		
	
	}

	public function get($id = null){
		return $this->role->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$role['id'] = $data['id'];
		}
		
		$role['name'] 			= $data['name'];
		$role['description'] 	= $data['description'];
		$role['access_level']	= $data['access_level'];


		return $this->role->save($role);
	}

	public function delete($id)
	{
		$this->role->delete($id);
	}

	
	public function getRolesIdName()
	{
		//get all roles
		$roles = $this->role->get(null, false);
		if(!empty($roles)){
			$r = [];
			foreach($roles as $value ){
				$r[$value->id] = $value->name;
	 		}
 		}
		return $r;
	}

}