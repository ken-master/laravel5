<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;


use App\Services\UserService;

use Illuminate\Http\Request;


class AuthController extends Controller {


	/**
	*
	*
	*/
	public function __construct(UserService $user)
	{
		$this->user = $user;
	}

	public function getIndex()
	{
		return view('auth.login');
	}

	public function getLogin()
	{

		return view( 'auth.login' );
	}


	public function getRegister()
	{


		return view('auth.register');
	}


	public function postStore( RegisterUserRequest $request )
	{

		$this->user->save( $request->all() );
		return redirect('auth/login')->with('message', "Successfully Registered!" );
	}

}
