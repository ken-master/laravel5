<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasAccessLevel extends Model {

	//

	protected $table = 'roles_has_access_level';

    //protected $fillable  = ['roles_id', 'access_level_id'];

	public function access_level()
    {
        return $this->belongsToMany('App\Models\AccessLevels');
    }



	public function roles()
    {
        return $this->belongsToMany('App\Models\Roles');
    }

}
