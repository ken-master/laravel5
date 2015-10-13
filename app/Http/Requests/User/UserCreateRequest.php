<?php namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UserCreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username' => 'required|unique:username',
			'email' => 'required|email|unique:users',
			'first_name' => 'required',
			'last_name' => 'required',
			'middle_name' => 'required',		
			'password' => 'required|min:6|',
			'password_confirmation' => 'required|min:6|same:password'
		];
	}

}
