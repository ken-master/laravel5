<?php namespace App\Services;

use App\Repositories\User\UserRepository;
use App\Http\Requests\RegisterUserRequest;

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

		if ( isset($data['id']) && is_int($data['id']) ) {
			$this->user->id = $data['id'];
		}

		$this->user->name 		= $data['full_name'];
		$this->user->email 		= $data['email'];
		$this->user->password 	= Hash::make($data['password']);
		
		return $this->user->save($data);
	}


}