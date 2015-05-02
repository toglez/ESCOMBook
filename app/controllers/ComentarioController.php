<?php

class ComentarioController extends BaseController {

	public function crear()
	{
		$comentario = new Comentario;
		$comentario->mensaje = Input::get('commentbox');
		$comentario->idUsuario = Input::get('created_by');
		$comentario->idPost = Input::get('post');
		// si escogio una fto
		if(Input::file('image')){
			$image = Input::file('image');
			$comentario->tipo_post = '1';
			$comentario->rutaMultimedia = 'uploads/comments/'.$image->getClientOriginalName();
			//guardamos la imagen en public/uploads/comments con el nombre original de la imagen
			$destination_path = "uploads/comments";
			$destination_filename = $image->getClientOriginalName();
			$image->move($destination_path, $destination_filename);
		}
		if (Auth::user()->tipo == '3'){
			//$comentario->permiso = '3';
			//Guardamos
			$comentario->save();
			return Redirect::back(); // Regresa al Muro
		}elseif (Auth::user()->tipo == '2'){
			//$comentario->permiso = '2';
			$comentario->save();
			return Redirect::back();
		}else{
			//$comentario->permiso = '1';			
			$comentario->save();
			return Redirect::back(); // '/wall' is the url to redirect
		}
		
		// Y Devolvemos una redirección a la acción show para mostrar el usuario
		
	}

	public function borrar($id){
		$result = Comentario::find($id);
        $result->delete();
		if (Auth::user()->tipo == '3'){
			
			return Redirect::back(); // Regresa al Muro
		}elseif (Auth::user()->tipo == '2'){
			
			
			return Redirect::to('encargado.muro'); // Regresa al Muro
		}else{
			
			return Redirect::to('administrador.muro'); // '/wall' is the url to redirect
		}
	}
}
