<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevelHasPermissions extends Model {

	
	protected $table = 'access_level_has_permissions';

	public function access_level()
    {
        return $this->belongsToMany('App\AccessLevels');
    }



	public function permissions()
    {
        return $this->belongsToMany('App\Permissions');
    }

}
