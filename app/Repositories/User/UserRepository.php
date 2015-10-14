<?php namespace App\Repositories\User;

use App\Repositories\User\UserInterface;

//Models
use App\User;
use App\UserProfiles;

//helpers
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface {


	protected $user;

	protected $userProfiles;

	protected $limit = 2;


	public function __construct(User $user, UserProfiles $userProfiles)
	{
		$this->user = $user;
		$this->userProfiles = $userProfiles;
	}

	/**
	 *  return object
	 */
	public function get($id = null)
	{
		$user = $this->user->paginate($this->limit);
		if (!is_null($id)){
			$user = $this->user->find($id);
		}
		return $user;
	}

	/**
	 * Insert New Record, if User ID exist then UPDATE record
	 * return Boolean
	 */
	public function save( $data )
	{
		
		$user = $this->user;
		$userProfiles = $this->userProfiles;

		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$user =	$this->user->find($data['id']);
		}


		//insert Users
		$user->username 	= $data['username'];
		$user->email 		= $data['email'];
		$user->password 	= $data['password'];
		$user->role_id 		= $data['role_id'];
		$user->status_id 		= $data['status_id'];
		$user->save();


		//get UserId inserted
		$id = $user->id;

		//dd($id);
		//insert UserProfiles
		$userProfiles->user_id 		= $id;
		$userProfiles->first_name 	= $data['first_name'];
		$userProfiles->last_name 	= $data['last_name'];
		$userProfiles->middle_name 	= $data['middle_name'];
		$userProfiles->division 	= $data['division'];
		$userProfiles->department 	= $data['department'];
		$userProfiles->section 		= $data['section'];
		$userProfiles->posistion 	= $data['posistion'];


		return $userProfiles->save();

		/*
		foreach($data as $key => $value){
			$user->$key = $value;
		}

		return $user->save();
		*/

	}

	public function delete(int $Id)
	{
		return false;
	}
}