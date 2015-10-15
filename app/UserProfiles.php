<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfiles extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_profiles';


	public function user()
    {
        return $this->belongsTo('App\User');
    }

}
