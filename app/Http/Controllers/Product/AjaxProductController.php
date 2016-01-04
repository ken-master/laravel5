<?php
namespace App\Http\Controllers\Product;


use Illuminate\Http\Request;

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

	
	public function getStoreProduct($sid,$pid)
	{
		return json_encode( $this->product->getStoreProduct($sid,$pid) );
	}
	
	
	public function getVendorProductUpdate(Request $request){

		$data = $request->all();

		return $this->product->getVendorProductUpdate($data);
	}
	
	public function getStoreProductUpdate(Request $request){
	
		$data = $request->all();
	
		return $this->product->getStoreProductUpdate($data);
	}

    public function getStoreProductUpdateQty(Request $request){

        $data = $request->all();

        return $this->product->getStoreProductUpdateQty($data);
    }

    public function getByName(Request $request){

        $data = $request->all();

        return $this->product->getByName($data);
    }

}