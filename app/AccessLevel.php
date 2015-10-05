<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'access_level';



	public function permissions()
	{
		return $this->hasMany('App\AccessLevelHasPermissions');
	}

}
