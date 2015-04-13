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
	if (Auth::check())
{
    		if(Auth::user()->tipo == '1'){
				return Redirect::to('administrador');
			}
			elseif (Auth::user()->tipo == '2') {
				return Redirect::to('encargado');
			}
			else{
				return Redirect::to('egresado');
			}// El usuario está autenticado
}
 return View::make('login.index'); 
});




Route::post('verificarlogin','UserLogin@user'); //Login


Route::get('logout',function() //Cerrar Sesión
{
	Auth::logout();
	return Redirect::to('/');
});


Route::get('administrador', array('before' => 'auth', function()  // Tipo 1
{
	if (Auth::check())
{
    		if(Auth::user()->tipo == '1'){
				return View::make('administrador.index');
			}
			elseif (Auth::user()->tipo == '2') {
				return Redirect::to('encargado');
			}
			else{
				return Redirect::to('egresado');
			}// El usuario está autenticado
}
}));



Route::get('encargado', array('before' => 'auth', function() // Tipo 2
{
	if (Auth::check())
{
    		if(Auth::user()->tipo == '1'){
				return Redirect::to('administrador');
			}
			elseif (Auth::user()->tipo == '2') {
				return View::make('encargado.index');
			}
			else{
				return Redirect::to('egresado');
			}// El usuario está autenticado
}

}));


Route::get('egresado', array('before' => 'auth', function() // Tipo 3
{
	if (Auth::check())
{
    		if(Auth::user()->tipo == '1'){
				return Redirect::to('administrador');
			}
			elseif (Auth::user()->tipo == '2') {
				return Redirect::to('encargado');
			}
			else{
				return View::make('egresado.index');
			}// El usuario está autenticado
}

}));




Route::get('agregarUsuario', array('before' => 'auth', function() // Agregar Usuario Administrador
{
	return View::make('administrador.agregarUsuario');
}));


// Toño
Route::get('wall', 'PostController@wall');
Route::post('wall', 'PostController@store');

Route::post('eliminar','PostController@delete'); //Eliminar
Route::post('actualizar','PostController@update'); //Actualizar

Route::get('gestionPosts', 'PostController@mostrarTodos');
Route::get('gestionPosts.show/{id}', 'PostController@show');
Route::get('gestionPosts.edit/{id}', 'PostController@edit');
Route::get('gestionPosts.delete/{id}', 'PostController@erase');

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



Route::get('agregarPost',function() // Registrar Post
{
	$post = new Post;
	$post -> mensaje = "Soy Armando, que pedo!";


	$post -> save();
	return "El Post Fue agregado Correctamente";

}
	);