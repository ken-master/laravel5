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

		
		return $this->user->save($data);
		//return $data;
	}


}