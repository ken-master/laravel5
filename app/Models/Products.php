<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class Products extends Model
{
    
	/**
	 * Table name
	 * @var string
	 */
	protected $table = 'produccts';


	public function vendor(){
		return $this->belongsToMany('App\Models\Vendor');
	}

}
