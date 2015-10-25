<?php namespace App;

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
		return $this->belongsToMany('App\Users');
	}

	/***
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function accessLevel()
    {
        return $this->hasMany('App\AccessLevel');
    }



}
