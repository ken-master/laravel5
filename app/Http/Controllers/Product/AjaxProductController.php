<?php
namespace App\Http\Controllers\Product;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


//HTTP Requests
//use App\Http\Requests\Vendor\VendorCreateRequest;
//use App\Http\Requests\Vendor\VendorUpdateRequest;


//Services
use App\Services\ProductService;


class AjaxPRoductController extends Controller
{



	protected $product;


	public function __construct(ProductService $product){
		$this->product = $product;
	}


	public function getVendorProduct($vid,$pid)
	{
		return json_encode( $this->product->getVendorProduct($vid,$pid) );
	}

	public function getVendorProductUpdate($vid,$pid, Requests $request){
		return $request->all();
	}

}