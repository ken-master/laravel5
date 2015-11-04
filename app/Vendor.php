<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model {

	//use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vendors';
	//protected $fillable  = ['roles_id', 'access_level_id'];
	/**
	 * Soft Deleting, so soft that you could put your face to it. so smoothy soft!
	 * @var string
	 */
	//protected $dates = ['deleted_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function address()
	{
		return $this->belongsTo('App\Address', 'address_id', 'id', 'address');
	}


}
