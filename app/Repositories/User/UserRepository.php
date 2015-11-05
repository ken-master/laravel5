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

	protected $limit = 10;

	/**
	 * Inject Model Objects then instantiate
	 * @param User
	 * @param UserProfiles
	 */
	public function __construct(User $user, UserProfiles $userProfiles)
	{
		$this->user = $user;
		$this->userProfiles = $userProfiles;
	}

	/**
	 * @param  User Id
	 * @return Users object wiht paginated list
	 */
	public function get($id = null)
	{

		$user = $this->user->with('profile')->where('is_superadmin', '=', 0 )->paginate($this->limit);

		/*foreach($user as $key => $value){
			dd($value->profile);
		}*/

		if (!is_null($id)){
			$user = $this->user->find($id);
		}
		return $user;
	}

	/**
	 * Insert or Update User Information
	 * @param  Array
	 * @return Boolean
	 */
	public function save( $data )
	{
		
		$user = $this->user;
		
		//check if Id exist, then update
		if( isset($data['id'])  && !empty($data['id']) ){
			$user =	$this->user->find($data['id']);
		}


		//insert Users
		
		if( isset($data['username'])  && !empty($data['username']) ){
			$user->username 	= $data['username'];
		}

		if( isset($data['email'])  && !empty($data['email']) ){
			$user->email 		= $data['email'];
		}

		$user->password 		= $data['password'];
		$user->roles_id 			= $data['role_id'];
		$user->status 		= $data['status'];
		$user->save();

		
		//User Profiles
		$userProfiles = $this->userProfiles;



		if( !is_null(
				$this->userProfiles
					->where('user_id',$user->id)
					->first()
					
			) 
		){
			$userProfiles = $this->userProfiles->where('user_id',$user->id)->first();
		//dd($userProfiles);
		}
	

		//insert UserProfiles
		$userProfiles->user_id 		= $user->id;
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

	/**
	 * @param  int
	 * @return Boolean
	 */
	public function delete($id)
	{
		$user =  $this->user->find($id);
		return  $user->delete();
		
	}
}