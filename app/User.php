<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;



class User extends Model implements AuthenticatableContract, CanResetPasswordContract{

	
	use Authenticatable, CanResetPassword;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'username', 
			'email', 
			'password',
			'first_name',
			'last_name',
			'middle_name',
			'role_id',
			'status_id',
			'section',
			'division',
			'posistion',
			'department'
			];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];



	public function profile()
    {
        return $this->hasOne('App\UserProfiles','user_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Roles','roles_id');
    }





}
