<?php

class AdministradorController extends BaseController{

	public function __construct()
	{
		$this->beforeFilter('auth'); //Bloqueo de Acceso
	}

	public function getIndex()
	{
		return View::make('administrador.index');
	}
}
?>