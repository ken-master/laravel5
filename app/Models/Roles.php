<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * Invert reference to USERs Table/Model
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->hasOne('App\Models\User');
	}

	/***
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function accessLevel()
    {
        return $this->belongsToMany('App\Models\AccessLevel', 'roles_has_access_level', 'roles_id', 'access_level_id');
    }

    /*public function permissions()
    {
    	return $this->belongsToMany('App\AccessLevel', 'roles_has_access_level', 'access_level_id', 'access_level_id' );
    }*/

}
