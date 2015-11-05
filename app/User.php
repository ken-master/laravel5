<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract{

	
	use Authenticatable, CanResetPassword;
	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    protected $dates = ['deleted_at'];

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
			'roles_id',
			'is_superadmin',
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
