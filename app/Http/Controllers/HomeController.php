<?php namespace App\Http\Controllers;



use App\Services\UserService;

use Auth;




class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	protected $user;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(UserService $user)
	{
		$this->user = $user;
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		//the example code to fetch user with access level
		
		/*dd( Auth::user()->join('roles_has_access_level','roles_has_access_level.access_level_id', '=' ,'access_level_has_permission.access_level_id')
				->where( 'roles_has_access_level.roles_id', Auth::user()->roles_id )
				->get() );*/
		
		//$test = Auth::user()->role->with('accessLevel')->find( 30 )->toArray();
		//dd( Auth::user()->role->with(['accessLevel.routes'])->find( Auth::user()->roles_id )->toArray() );

		//dd($this->user->get());
		return view('home');
	}


	public function getTest()
	{
		dd('ken was here');
	}

}
