<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model {

	//use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sales';

	/**
	 * Soft Deleting, so soft that you could put your face to it. so smoothy soft!
	 * @var string
	 */
	//protected $dates = ['deleted_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function saleItems()
	{
		return $this->hasMany('App\Models\SaleItems');
	}

}
