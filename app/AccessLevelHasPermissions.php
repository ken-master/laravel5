<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevelHasPermissions extends Model {

	
	protected $table = 'access_level_has_permission';

	/*public function permissions()
    {
        return $this->belongsToMany('App\AccessLevels');
    }
*/

    public function scopePermissions($query, $data)
    {
    	return $query->whereIn('access_level_id', $data);
    }


}
