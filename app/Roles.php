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
	* Uncomment if needed OPTIONAL
	*/
	// public function users()
 //    {
 //        return $this->belongsToMany('App\Users');
 //    }

	public function access_level()
    {
        return $this->hasMany('App\RoleHasAccessLevel');
    }






}
