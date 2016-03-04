<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password', 'avatar'];


	protected $hidden = ['password', 'remember_token'];

	public function topics() {
        return $this->hasMany('App\Topic');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function isAdmin() {
    	return $this->admin == 1;
    }
}
