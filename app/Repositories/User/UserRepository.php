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
		return $this->user->all();
	}

	public function save(array $data)
	{

		$this->user->name = $data['full_name'];
		$this->user->email = $data['email'];
		$this->user->password = Hash::make($data['password']);
		if( $this->user->save() ){
			return true;	
		}
		
		return false;
	}

	public function delete()
	{
		return false;
	}
}