<?php if(Auth::check()) { ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administrador</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h2> Bienvenido {{ Auth::user()->name}} </h2>
	Esta es la Vista del Administrador

	<br><br>
	<a href="logout">Cerrar Sesión</a>
</body>
</html>

<?php } ?>