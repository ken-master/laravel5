<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model {

	//use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vendors';
	//protected $primaryKey  = 'vendor_id';
	/**
	 * Soft Deleting, so soft that you could put your face to it. so smoothy soft!
	 * @var string
	 */
	//protected $dates = ['deleted_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function address()
	{
		return $this->belongsTo('App\Models\Address', 'address_id', 'id', 'address');
	}


}
