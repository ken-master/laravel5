<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model {

	//use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'access_levels';

	/**
	 * Soft Deleting, so soft that you could put your face to it. so smoothy soft!
	 * @var string
	 */
	//protected $dates = ['deleted_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function permissions()
	{
		//return $this->hasMany('App\AccessLevelHasPermissions');
		//return $this->hasMany('App\Permissions');
		//return $this->belongsToMany('App\Permissions', 'access_level_has_permission', 'access_level_id','permissions_id');
		return $this->belongsToMany('App\Permissions', 'access_level_has_permission', 'access_level_id','route_name');
	}

	/**
	 * [routes description]
	 * @return [type] [description]
	 */
	public function routes()
	{
		return $this->hasMany('App\AccessLevelHasPermissions');
	}

	/**
	 * [roles description]
	 * @return [type] [description]
	 */
	public function roles()
	{
		return $this->belongsToMany('App\Roles', 'role_has_access_level', 'roles_id', 'access_level_id');
	}

}
