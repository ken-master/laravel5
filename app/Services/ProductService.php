<?php 

namespace App\Services;

use App\Repositories\Product\ProductRepository;

use Illuminate\Support\Facades\Route;


//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class ProductService{

	protected $product;
	
	

	public function __construct( ProductRepository $product)
	{
		$this->product = $product;
		
	}

    public function getAll(){
        return $this->product->getAll();
    }

	public function get($id = null){
		return $this->product->get($id);
	}

	public function getSelectedVendors(){
		return $this->product->vendor();
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$product['id'] = $data['id'];
		}
		/*
		foreach($data['vendors'] as $key => $value){
			$vendors[$value] = array( 'max_qty' => $data['max_qty'], 'min_qty' => $data['min_qty'] );
		}
		
		$product['vendors'] = $vendors;
		*/
		if(!empty($data['vendors'])){
			$product['vendors']				= $data['vendors'];

		}
		
		$product['name'] 				= $data['name'];
		$product['sku'] 				= $data['sku'];
		$product['brand'] 				= $data['brand'];
		$product['manufacturer_sku'] 	= $data['manufacturer_sku'];
		$product['barcode'] 			= $data['barcode'];
		$product['price'] 				= $data['price'];
		$product['price1'] 				= $data['price1'];
		$product['price2'] 				= $data['price2'];
		$product['price3'] 				= $data['price3'];
		$product['lower_limit'] 		= $data['lower_limit'];
		$product['higher_limit'] 		= $data['higher_limit'];
		$product['description'] 		= $data['description'];

		return $this->product->save($product);
	}

	public function delete($id)
	{
		//TO DO:
		// CRAETE FORM HELPER FOR DELETE FORM to pass 
		// HTTP DELETE Protocol
		return $this->product->delete($id);
	}

	
	public function getVendorProduct($vendorId,$productId)
	{
		return $this->product->getVendorProduct($vendorId,$productId);
	}

	public function getVendorProductUpdate($data)
	{
		return $this->product->getVendorProductUpdate($data);
	}
	
	public function getStoreProduct($storeId,$productId)
	{
		return $this->product->getStoreProduct($storeId,$productId);
	}
	
	public function getStoreProductUpdate($data)
	{
		return $this->product->getStoreProductUpdate($data);
	}

    public function getStoreProductUpdateQty($data)
    {
        return $this->product->getStoreProductUpdateQty($data);
    }


    public function getByName($productName)
    {
    	$productName = $productName['q'];

    	return $this->product->getByName($productName);
    }

}