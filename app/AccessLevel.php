<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'access_levels';


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function permissions()
	{
		return $this->belongsToMany('App\Permissions', 'access_level_has_permission', 'access_level_id','permissions_id');
	}



}
