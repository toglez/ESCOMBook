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
    		if(Auth::user()->tipo == '1' and Auth::user()->status == '1'){
				return Redirect::to('administrador');
			}
			elseif (Auth::user()->tipo == '2' and Auth::user()->status == '1') {
				return Redirect::to('encargado');
			}
			elseif (Auth::user()->tipo == '3' and Auth::user()->status == '1') {
				return Redirect::to('egresado');
			}
		
}
 return View::make('login.index'); 
});



Route::get('inicio', function()  // INICIO
{
 return View::make('login.index'); 
});





Route::post('verificarlogin','UserLogin@user'); //Login de Usuarios
Route::post('verificarPreRegistro','UserLogin@verificarpreregistro'); // Verificar Pre-Registro
Route::get('PreRegistro', function() // Despliega Vista Pre-Registro
{
	return View::make('login.preregistrado');
});

Route::post('GuardarPreRegistro','UserLogin@guardarpreregistro'); // Guardar Pre-Registro


Route::post('recuperar','UserLogin@verificarcorreo'); // Verificar Correo (Recuperacion Contraseña)
Route::get('recuperarContraseña', function() // Despliega Vista Recuperar
{
	return View::make('login.recuperar');
});



Route::get('logout',function() //Cerrar Sesión
{
	Auth::logout();
	return Redirect::to('/');
});


Route::get('administrador', array('before' => 'auth', function()  // Tipo 1
{
	if (Auth::check())
{
    		if(Auth::user()->tipo == '1' and Auth::user()->status == '1'){
				return View::make('administrador.index');
			}
			elseif (Auth::user()->tipo == '2' and Auth::user()->status == '1') {
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
    		if(Auth::user()->tipo == '1' and Auth::user()->status == '1' ){
				return Redirect::to('administrador');
			}
			elseif (Auth::user()->tipo == '2' and Auth::user()->status == '1') {
				return View::make('encargado.index');
			}
			else{
				return Redirect::to('egresado');
			}// El usuario está autenticado
}

}));

Route::get('editPost', array('before' => 'auth', function() 
{
$valor= $_GET["id"];
$valor2= $_GET["id2"];

return Redirect::to('editarPost')->with(array('idUser'=> $valor,'idPost'=>$valor2));

}));



Route::get('editarPost', array('before' => 'auth', function() 
{
	$valor = Session::get('idUser');
	$valor2 = Session::get('idPost');


	if (Auth::check())
{
    		if(Auth::user()->tipo == '1' and Auth::user()->status == '1' ){
    			return View::make('administrador.editarPost')->with(array('idUser'=> $valor,'idPost'=>$valor2));
			}
			elseif (Auth::user()->tipo == '2' and Auth::user()->status == '1') {
				return View::make('encargado.editarPost')->with('idUsuario',$valor);
			}
			else{
				return View::make('egresado.editarPost')->with('idUsuario',$valor);
			}
}

}));

Route::get('egresado', array('before' => 'auth', function() // Tipo 3
{
	if (Auth::check())
{
    		if(Auth::user()->tipo == '1' and Auth::user()->status == '1' ){
				return Redirect::to('administrador');
			}
			elseif (Auth::user()->tipo == '2' and Auth::user()->status == '1') {
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


/* Rutas del muro: PostController */
// Toño
Route::get('egresado', 'PostController@wall');
Route::post('egresado', 'PostController@store');
//Nuevas Rutas
Route::get('egresado.muro', 'PostController@myMuro');
Route::get('encargado.muro', 'PostController@wall');
Route::get('encargado.miMuro', 'PostController@myMuro');
Route::get('administrador.muro', 'PostController@wall');
// Route::get('wall', 'PostController@wall');
// Route::post('wall', 'PostController@store');

Route::post('eliminar','PostController@delete'); //Eliminar
Route::post('actualizar','PostController@update'); //Actualizar

Route::get('gestionPosts', 'PostController@mostrarTodos');
Route::get('gestionPosts.show/{id}', 'PostController@show');
Route::get('gestionPosts.edit/{id}', 'PostController@edit');
Route::post('gestionPosts.edit/{id}', 'PostController@actualizar');
Route::get('gestionPosts.delete/{id}', 'PostController@erase');

Route::get('borrar/{id}', [
    'as' => 'borrar', 'uses' => 'PostController@erase'
]);

Route::post('egresado', [
    'as' => 'crear', 'uses' => 'ComentarioController@crear'
]);