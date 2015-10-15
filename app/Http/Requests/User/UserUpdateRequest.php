<?php namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request {

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
		//http://laravel.com/docs/5.0/validation#rule-unique
		return [
			//'username' => 'required|unique:users,username',
			//'email' => 'required|email|unique:users',
			'first_name' => 'required',
			'last_name' => 'required',
			'middle_name' => 'required',		
			'password' => 'min:6|',
			'password_confirmation' => 'min:6|same:password',
			'role' => 'required|not_in:0',
			'status' => 'required|not_in:0'

		];
	}

}
