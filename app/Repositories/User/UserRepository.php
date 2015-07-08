<?php namespace App\Repositories\User;

use App\Repositories\User\UserInterface;
use App\User;


//helpers
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface {


	protected $user;


	public function __construct(User $user)
	{
		$this->user = $user;
	}


	public function get(int $id = null)
	{
		$user = $this->user->all();
		if (!is_null($id)){
			$user = $this->user->all($id);
		}
		return $user;
	}

	public function save(array $data)
	{

		if( $this->user->save() ){
			return $this;	
		}
		
		return false;
	}

	public function delete(int $Id)
	{
		return false;
	}
}