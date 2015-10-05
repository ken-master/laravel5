<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasAccessLevel extends Model {

	//

	protected $table = 'role_has_access_level';



	public function access_level()
    {
        return $this->belongsToMany('App\AccessLevels');
    }



	public function roles()
    {
        return $this->belongsToMany('App\Roles');
    }

}
