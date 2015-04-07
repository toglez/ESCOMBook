<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()  // RAIZ
{
 return View::make('login.index'); 
});


Route::post('verificarlogin','UserLogin@user'); //Login


Route::get('logout',function() //Cerrar Sesión
{
	Auth::logout();
	return Redirect::to('/');
});


Route::get('admin', array('before' => 'auth', function()
{
	return View::make('administrador.index');
}));

Route::get('encargado', array('before' => 'auth', function()
{
	return View::make('encargado.index');
}));

Route::get('egresado', array('before' => 'auth', function()
{
	return View::make('egresado.index');
}));




Route::controller('administrador','AdministradorController'); //Admin






Route::get('registrar',function() // Registrar Usuario
{
	$user = new User;
	$user -> name = "Ivan";
	$user -> last_name = "Peréz";
	$user -> email = "ivan@hotmail.com";
	$user -> username = "ivan";
	$user -> password = Hash::make("789");
	$user -> tipo = "3";

	$user -> save();
	return "El Usuario Fue agregado Correctamente";

}
	);