<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {

	//use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stores';

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
