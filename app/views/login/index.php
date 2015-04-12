<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <title>ESCOMBook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" href="css/extras/font-awesome.min.css">  
  <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css"> <!-- ESTILOS -->

</head>

<body>

        <header>
              <div id="logo_sep">
                <img src="images/logos/logoSEP.png">
              </div>
              <div id="logo_ipn" >
                <a href="http://www.ipn.mx/" target="_blank"><img src="images/logos/logoIPNGris.png"></a>
              </div>  
       </header>
	
		<nav>
  			<ol class="breadcrumb">
  				<li><a href="http://www.ipn.mx/">Inicio IPN</a>&nbsp;<span>|</span></li>
				<li><a href="http://www.ipn.mx/Paginas/Correo-Electronico.aspx">Correo Electrónico</a>&nbsp;<span>|</span></li>
				<li><a href="http://www.ipn.mx/Paginas/Instalaciones.aspx">Instalaciones</a>&nbsp;<span>|</span></li>
				<li><a href="http://www.ipn.mx/Paginas/Servicios-Medicos.aspx">Servicios Médicos</a>&nbsp;<span>|</span></li>
				<li><a href="http://www.ipn.mx/Paginas/Calendario-Escolar-IPN.aspx" >Calendario</a>&nbsp;<span>|</span></li>
				<li><a href="http://www.ipn.mx/Paginas/Contacto.aspx">Contacto</a>&nbsp;</li>
		    </div><!-- /.nav-collapse -->
			</ol>
		</nav>
		

		<section class="fondoBlanco">
			<div class="container">
				<img src="images/logos/logoEscom.png" id="logo_escom">
					<div id="texto-titulo">
						<titulo-inicio> Sistema de Seguimiento a Egresados (ESCOMBook). </titulo-inicio>
					</div><!--/.nav-collapse -->
			</div>	
			
				<article>

								     <center>
					 				 <?php if (Session::has('login_errors')) {?>
					 				 <p style='color:#FB1D1D'> El Usuario y/o Contraseña son incorrectos. </p>
					 				 <?php }?>
					 				</center>					

				<button data-toggle="modal" type="button" class="btn btn-primary btn-lg" href="#login" data-target="#login">Iniciar Sesión</button>
				<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
								<h4>Login de Usuario</h4>
							</div>
							  	<div class="modal-body">
									<form class="form-horizontal" method="post" action="verificarlogin">
					 				 <?php if (Session::has('login_errors')) {?>
					 				 <p></p>
					 				 <?php }else {?>
					 				 <p> Introduzca Usuario y Contraseña para continuar. </p>
					 				 <?php } ?>

					 				 <div class="control-group">
										<label class="control-label" for="inputEmail">Nombre de Usuario:</label>
										<div class="controls">
						  				<input type="text" name="username" placeholder="Usuario">
						  				</div>
					  				</div>
					  				<div class="control-group">
										<label class="control-label" for="inputPassword">Contraseña:</label>
										<div class="controls">
						  				<input type="password" name="password" placeholder="Password">
										</div>
					  				</div>
					  				<br>
									<p>¿No recuerdas tu usuario y/o contraseña? <a data-toggle="modal"href="#recuperar">Da clic aquí</a></p>
									 <div class="modal-footer">
										<input type="submit" value="Enviar"> 
										<input type="reset"></form>		
									 </div>
			  					</div>
						</div>
					</div>
				</div>


				<button data-toggle="modal" type="button" class="btn btn-primary btn-lg" href="#encuesta" data-target="#encuesta">Encuesta</button>
				<div class="modal fade" id="encuesta" tabindex="-1" role="dialog" aria-labelledby="modalEncuesta" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
								<h4>Encuesta</h4>
							</div>
							  	<div class="modal-body">
									<form class="form-horizontal" method="get" action="index.php">
					 				 <div class="control-group">
										<label class="control-label" for="input">Nombre Completo:</label>
										<div class="controls">
						  				<input type="text" name="nombre_completo">
						  				</div>
					  				</div>
					  				<div class="control-group">
										<label class="control-label" for="input">Campo 1:</label>
										<div class="controls">
						  				<input type="text" name="campo1" placeholder="Campo1">
										</div>
					  				</div>
					  				<div class="control-group">
										<label class="control-label" for="input">Campo 2:</label>
										<div class="controls">
						  				<input type="text" name="campo2" placeholder="Campo2">
										</div>
					  				</div>
					  				<div class="control-group">
										<label class="control-label" for="input">Campo 3:</label>
										<div class="controls">
						  				<input type="text" name="campo3" placeholder="Campo3">
										</div>
					  				</div>
					  				<div class="control-group">
										<label class="control-label" for="input">Campo 4:</label>
										<div class="controls">
						  				<input type="text" name="campo4" placeholder="Campo4">
										</div>
					  				</div>
									 <div class="modal-footer">
										<input type="submit" value="Enviar Datos"> 	
									 </div>
			  					</div>
						</div>
					</div>
				</div>
			</article>

	<article>
		<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">

				   <div class="carousel slide" id="myCarousel">
					<div class="carousel-inner">

						<div class="item active">

							<div class="bannerImage">
								<a href="#"><img src="images/carrusel-1.png" alt=""></a>
							</div>
						</div><!-- /Slide1 --> 

						<div class="item">
							<div class="bannerImage">
								<a href="#"><img src="images/carrusel-2.png" alt=""></a>
							</div>                                              
						</div><!-- /Slide2 -->             

						<div class="item">
							<div class="bannerImage">
								<a href="#"><img src="images/carrusel-3.png" alt=""></a>
							</div>                                                 
						</div><!-- /Slide2 -->                      

					</div>

					<div class="control-box">                            
						<a data-slide="prev" href="#myCarousel" class="carousel-control left">‹</a>
						<a data-slide="next" href="#myCarousel" class="carousel-control right">›</a>
					</div><!-- /.control-box -->   

				</div><!-- /#myCarousel -->

		</div><!-- /.span12 -->          
	</div><!-- /.row --> 
</div><!-- /.container -->
	</article>

		<article>
		<h4 id="h4">Si es la primera vez que entras a la aplicación, revisa si estás pre-registrado &nbsp
			<button data-toggle="modal" type="button" class="btn btn-primary btn-lg" href="#revisar" data-target="#revisar">Revisar</button>
				<div class="modal fade" id="revisar" tabindex="-1" role="dialog" aria-labelledby="modalRevisar" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
								<h4>Verificar Pre-Registro</h4>
							</div>
							  	<div class="modal-body">
									<form class="form-horizontal" method="get" action="index.php">
					 				 <div class="control-group">
										<label class="control-label" for="input">CURP</label>
										<div class="controls">
						  				<input type="text" name="curp" placeholder="CURP">
						  				</div>
					  				</div>
									 <div class="modal-footer">
										<input type="submit" value="Enviar"> 
										<input type="reset"></form>		
									 </div>
			  					</div>
						</div>
					</div>
				</div>
		</h4>	
	</article>

		</section>
	
	<footer id="footer">
  <center>
    <div class="container">
		<div class="pull-right">	 
		<div class="fb-like" data-href="https://www.facebook.com/escom.iscipn.9" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>		 
		</div><br><br>

		<div class="pull-right">     
				 <p class="guinda center">Escuela Superior de Cómputo.</p>
				 <p class="center">Esta página es una obra intelectual protegida por la Ley Federal del Derecho de Autor, puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica; su uso para otros fines, requiere autorización previa y por escrito del Director General del Instituto.<br>
					® 2015
				</p> 
				
		</div>  		
         
        </div>
       
        <!--/Copyright-->
      </div>
    </div>
  </footer>
<!--/Footer-->  <!--/Footer-->

  <script src="js/estilos.js"></script>
  <script src="js/jquery-1.11.2.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
			

</html>