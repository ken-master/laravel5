<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class Products extends Model
{
    
	/**
	 * Table name
	 * @var string
	 */
	protected $table = 'products';


	public function vendor(){
		return $this->belongsToMany('App\Models\Vendor','vendors_products', 'vendor_id', 'product_id');
	}

}