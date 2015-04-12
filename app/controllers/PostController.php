<?php

class PostController extends BaseController {

	public function store()
	{
		$post = new Post;
		$post->mensaje = Input::get('feedbox');
		//Guardamos
		$post->save();
		// Y Devolvemos una redirección a la acción show para mostrar el usuario
		return Redirect::to('/wall'); // '/wall' is the url to redirect
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



	public function delete()
	{
		$id = Input::get('invisible');

		$postdata = Post::find( $id );
        $postdata->delete();

        return Redirect::to('wall'); // Regresa al Muro
	}






	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publishOptions()
	{
		$id = Input::get('invisible');
		$select = Input::get('option');
		// if ($select == 'edit') {
		// 	edit($id);
		// }elseif ($select == 'delete') {
		// 	delete($id);
		// }else
		//return 'No paso ni edit o delete';
		return $id;
	}
}
