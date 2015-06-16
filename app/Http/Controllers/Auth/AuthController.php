<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


class AuthController extends Controller {


	/**
	*
	*
	*/
	public function __construct()
	{

	}

	public function getIndex()
	{

	}

	public function getLogin()
	{

		return view( 'auth.login' );
	}


	public function getRegister()
	{
		return view('auth.register');
	}

}
