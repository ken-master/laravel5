<?php namespace App\Services;

use App\Repositories\User\UserRepository;
use App\Http\Requests\RegisterUserRequest;

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
		
		$user['first_name'] = $data['first_name'];
		$user['last_name'] 	= $data['last_name'];
		$user['email']		= $data['email'];
		$user['password'] 	= \Hash::make($data['password']);
		
		//dd( $user );
		return $this->user->save($user);
	}


}