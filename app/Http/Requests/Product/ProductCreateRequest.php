<?php namespace App\Http\Requests\Product;

use App\Http\Requests\Request;

class ProductCreateRequest extends Request {

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
			//'vendors'		=> 'required',
			'name' 			=> 'required',
			//'description' 	=> 'required',
			'sku' 			=> 'required',
		];
	}


	public function messages()
	{
		return  [

			'vendors.required' => 'The Vendor Field is Required',
		];
	}

}
