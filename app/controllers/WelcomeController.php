<?php

class WelcomeController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    
    public function index()
    {
        return View::make('welcome');
    }

    public function wall()
    {
        $publicaciones = Post::all();
        // $publicaciones = Post::orderBy('id','asc')->paginate(5);
        $options = array('' => '', 'edit' => 'Editar', 'delete' => 'Eliminar');
        return View::make('admin/wall/wall', array('posts' => $publicaciones, 'options' => $options));
        //return $publicaciones;
    }
}
