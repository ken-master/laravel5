<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItems extends Model {

	//use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sale_items';

	/**
	 * [$fillable description]
	 * @var array
	 */
	protected $fillable = [
			'item_price',
			'quantity',
			'sku',
			'brand',
			'total',
			'discount',
			'product_id'
	];

	/**
	 * Soft Deleting, so soft that you could put your face to it. so smoothy soft!
	 * @var string
	 */
	//protected $dates = ['deleted_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function sales()
	{
		return $this->belongsTo('App\Models\Sales');
	}

	public function products()
	{
		return $this->hasMany('App\Models\Products');
	}

}
