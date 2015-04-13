<?php

class PostController extends BaseController {

	public function wall()
    {
        
        $publicaciones = Post::all();
        foreach ($publicaciones as $post) {
            $date = $post->updated_at;    
            setlocale(LC_TIME, 'es_MX');
            $date = $date->formatlocalized('%A %d %B %Y');
        }
        // $publicaciones = Post::orderBy('id','asc')->paginate(5);
        $options = array('' => '', 'edit' => 'Editar', 'delete' => 'Eliminar');
        return View::make('muro/wall', array('posts' => $publicaciones, 'date' => $date));
        //return $publicaciones;
    }

	public function store()
	{
		$post = new Post;
		$post->mensaje = Input::get('feedbox');
		$post->idUsuario = Input::get('created_by');
		if (Auth::user()->tipo == '3')
			$post->permiso = '3';
		elseif (Auth::user()->tipo == '2')
			$post->permiso = '2';
		else
			$post->permiso = '1';			
		//Guardamos
		$post->save();
		// Y Devolvemos una redirección a la acción show para mostrar el usuario
		return Redirect::to('wall'); // '/wall' is the url to redirect
	}

	public function show($id){
		return 'ajajjaja';
	}	

	public function edit($id){
		$post = Post::find($id);
		return View::make('muro.edit', array('post' => $post)); // Regresa gestion posts
	}

	public function update()
	{
		$id = Input::get('idpublicacion');
		$mensaje = Input::get('mensaje');

		$postdata = Post::find( $id );
        $postdata-> mensaje = $mensaje;
        $postdata->save();

        return Redirect::to('wall'); // Regresa al Muro
	}

	public function actualizar()
	{
		$id = Input::get('idPost');
		$mensaje = Input::get('feedbox');

		$postdata = Post::find( $id );
        $postdata-> mensaje = $mensaje;
        $postdata->save();

        return Redirect::to('wall'); // Regresa al Muro
	}

	public function delete()
	{
		$id = Input::get('invisible');

		$postdata = Post::find( $id );
        $postdata->delete();

        return Redirect::to('wall'); // Regresa al Muro
	}

	public function erase($id)
	{
		$postdata = Post::find( $id );
        $postdata->delete();

        return Redirect::to('wall'); // Regresa al Muro
	}

	public function mostrarTodos()
	{
		$publicaciones = Post::orderBy('created_at', 'DESC')->paginate(10);
        return View::make('administrador.gestionPosts', array('posts' => $publicaciones)); // Regresa gestion posts
	}
}
