<?php namespace App\Services;

use App\Repositories\AccessLevel\AccessLevelRepository;

//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class AccessLevelService{

	protected $accessLevel;

	public function __construct( AccessLevelRepository $accessLevel )
	{
		$this->accessLevel = $accessLevel;
	}



	public function get($id = null){
		return $this->accessLevel->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$accessLevel['id'] = $data['id'];
		}
		
	
	
		$accessLevel['name'] 			= $data['name'];
		$accessLevel['description'] 	= $data['description'];
		$accessLevel['permission']		= $data['permission'];

		//delete permissions
		
		//insert permisison
		
	
		//dd( $user );
		return $this->accessLevel->save($accessLevel);
	}


}