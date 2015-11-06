<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

	//use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';

	/**
	 * Soft Deleting, so soft that you could put your face to it. so smoothy soft!
	 * @var string
	 */
	//protected $dates = ['deleted_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function zipcode()
	{
		return $this->belongsTo('App\Zip', 'zipcode_id', 'id', 'zipcode');
	}


}
