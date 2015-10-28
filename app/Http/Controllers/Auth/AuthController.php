<?php namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

//HTTP 
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginRequest;

//Services
use App\Services\UserService;

//Auth Related Stuffs
use Auth;


class AuthController extends Controller {


	/**
	 * when user failed to login, user will redirect here
	 * @var string
	 */
	protected $loginPath = '/auth';

	protected $redirectPath = '/home';

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

	public function postLogin( LoginRequest $request )
	{

		
		$data = $request->all();
		//dd( $data['email'] );
		if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'] ])) {
            // Authentication passed...
            return redirect()->intended('/home');
        }
		return redirect('/auth')->with('message', "Failed to Authenticate! Wrong email or password!");
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


	public function getLogout()
	{
		Auth::logout();
	}

}
