<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	public function post() {
        return $this->hasMany('post');
    }

    public function comentario() {
        return $this->hasMany('comentario');
    }

    public function correo_usuario() {
        return $this->hasMany('correo_usuario');
    }

    public function telefono_usuario() {
        return $this->hasMany('telefono_usuario');
    }

    public static function setPassword($input){
    	$respuesta = array();
    	$reglas =  array(
    		'newPassword'      => 'required',
        	'confirmPassword'  => 'same:newPassword',
        );
        $validator = Validator::make($input, $reglas);

        if($validator->fails()){
        	$respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{
        	$user = User::find(Auth::user()->id);
        	$user->password = Hash::make($input['newPassword']);
        	$user->save();
        	$respuesta['mensaje'] = 'Se ha cambiado la contraseña';
        	$respuesta['error']   = false;
        }
        return $respuesta;
    }

}
