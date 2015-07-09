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

	/**
	 *  return object
	 */
	public function get($id = null)
	{
		$user = $this->user->all();
		if (!is_null($id)){
			$user = $this->user->find($id);
		}
		return $user;
	}

	/**
	 * 
	 * return Boolean
	 */
	public function save( $data )
	{
		
		$user = $this->user;
		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$user =	$this->user->find($data['id']);
		}

		//convert them to object
		foreach($data as $key => $value){
			$user->$key = $value;
		}
		
		return $user->save();
	}

	public function delete(int $Id)
	{
		return false;
	}
}