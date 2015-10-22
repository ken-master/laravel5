<?php namespace App\Services;

use App\Repositories\User\UserRepository;
//use App\Http\Requests\RegisterUserRequest;

//use Illuminate\Contracts\Hashing\Hasher as Hash;

class UserService{

	protected $user;

	public function __construct( UserRepository $user  )
	{
		$this->user = $user;
	}



	public function get($id = null){
		return $this->user->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$user['id'] = $data['id'];
		}
		
		if ( isset($data['username']) && !empty($data['username']) ) {
			$user['username'] 		= $data['username'];
		}

		if ( isset($data['email']) && !empty($data['email']) ) {
			$user['email']			= $data['email'];
		}

		$user['password'] 		= \Hash::make($data['password']);
		$user['role_id'] 		= $data['role'];
		$user['status_id'] 		= $data['status'];

		$user['first_name'] 	= $data['first_name'];
		$user['last_name'] 		= $data['last_name'];
		$user['middle_name'] 	= $data['middle_name'];
		
		$user['department'] 	= $data['department'];
		$user['division'] 		= $data['division'];
		$user['section'] 		= $data['section'];
		$user['posistion'] 		= $data['posistion'];
		$user['status'] 		= $data['status'];
	
		//dd( $user );
		return $this->user->save($user);
	}


}