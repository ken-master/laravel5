<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'access_level';


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function permissions()
	{
		return $this->hasMany('App\Permissions', 'AccessLevelHasPermissions', 'access_level_id','permission_id');
	}



}
