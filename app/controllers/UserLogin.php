<?php

class UserLogin extends BaseController {

	public function user()
	{
		//get POST data
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			 );

		if(Auth::attempt($userdata))
		{
			
			if(Auth::user()->tipo == '1'){
				return Redirect::to('admin');
			}
			elseif (Auth::user()->tipo == '2') {
				return Redirect::to('encargado');
			}
			else{
				return Redirect::to('egresado');
			}

		}
		else
		{
			return Redirect::to('/')->with('login_errors',true);
		}
	}
}