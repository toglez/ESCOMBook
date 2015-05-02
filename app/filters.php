<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	/*if( Auth::check() ){
		if(Auth::user()->tipo == '1' and Auth::user()->status == '1')
			return View::make('administrador.index');
		elseif (Auth::user()->tipo == '2' and Auth::user()->status == '1')
			return Redirect::to('encargado');
		else
			return Redirect::to('egresado');
		// El usuario está autenticado
	}else
		return Redirect::to('/');*/
	if (Auth::guest()) return Redirect::guest('/');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

Route::filter('is_egresado', function($route, $request)
{
	//no te quieras pasar de listo
	if(Auth::user()->tipo != '3')
		if(Auth::user()->tipo == '1')
			return Redirect::to('administrador');
		elseif(Auth::user()->tipo == '2')
			return Redirect::to('encargado');
	//$route->getPath();
	//return Redirect::back();
});

Route::filter('is_admin', function($route, $request)
{
	//no te quieras pasar de listo
	if(Auth::user()->tipo != '1')
		if(Auth::user()->tipo == '2')
			return Redirect::to('encargado');
		elseif(Auth::user()->tipo == '3')
			return Redirect::to('egresado');
});

Route::filter('is_encargado', function($route, $request)
{
	//no te quieras pasar de listo
	if(Auth::user()->tipo != '2') //return Redirect::back();
		if(Auth::user()->tipo == '1')
			return Redirect::to('administrador');
		elseif(Auth::user()->tipo == '3')
			return Redirect::to('egresado');
});
