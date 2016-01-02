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
		return $this->belongsToMany('App\Models\Vendor','vendors_products', 'product_id', 'vendor_id')->withPivot('max_qty', 'min_qty', 'priority');
	}

    public function store() {
        return $this->belongsToMany('App\Models\Store','inventory','product_id', 'store_id')->withPivot('stocks', 'lower_limit', 'higher_limit');
    }

}
