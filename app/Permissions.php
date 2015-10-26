<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'permissions';

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function accessLevel()
	{
		return $this->belongsToMany('App\AccessLevel','access_level_has_permission', 'access_level_id','route_name');
	}



}
