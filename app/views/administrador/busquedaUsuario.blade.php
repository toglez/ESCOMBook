@extends('plantilla.masterAdmin')

@section('css')
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/bootstrap-theme.css') }}
{{ HTML::style('assets/css/vistaMuro.css') }}   
@stop

@section('content')
	<section id="main" class="column">
		
		<h4 class="alert_info">¡Bienvenido!

			<script>
			var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
			var f = new Date();
			document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
			</script>

			<div id="reloj"></div>
		</h4>

		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<br><p align="right"><a href="buscadorU" type="button" class="btn btn-default">Realizar Otra Busqueda</a></p>
	    </div>

		 <?php if (Session::has('cambiarStatus_Correcto')) {?>
			<h4 class="alert_success">Status Actualizado Correctamente!</h4>
		 <?php }?>	

		 <?php if (Session::has('actualizarDatos_Correcto')) {?>
			<h4 class="alert_success">Datos Actualizados Correctamente!</h4>
		 <?php }?>			 
	 		
		 		
		
<article class="module width_3_quarter">
		<header><h3 class="tabs_involved"><b>Usuarios Encontrados</b></h3>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					 
    				<th>Nombre Completo</th> 
    				<th>CURP</th>  
    				<th>Tipo</th>
    				<th>Status</th>  
    				<th>Acciones</th> 
				</tr> 
			</thead> 
			<tbody> 

				<?php  
				$BusquedaPorPalabra = Session::get("BusquedaPorPalabra");
				$BusquedaPorCurp = Session::get("BusquedaPorCurp");
				$BusquedaPorTipo = Session::get("BusquedaPorTipo");  
				$Generacion = Session::get("Generacion"); 
				$BusquedaPorStatus = Session::get("BusquedaPorStatus");  

				 if ($BusquedaPorPalabra != null) { // Busqueda por PAlabra Clave
				 	$users = User::where('nombre', 'LIKE', '%'.$BusquedaPorPalabra.'%')->orWhere('apPaterno', 'LIKE', '%'.$BusquedaPorPalabra.'%')->orWhere('apMaterno', 'LIKE', '%'.$BusquedaPorPalabra.'%')->orderBy('updated_at','desc')->paginate(10);
				 }

				 elseif ($BusquedaPorCurp != null) { // Busqueda por PAlabra Clave
				 	$users = DB::table('users')->where('username', '=', $BusquedaPorCurp)->paginate(10);
				 }	

				 elseif ($BusquedaPorTipo != null) { // Busqueda por Tipo
				 		$users = DB::table('users')->where('tipo', '=', $BusquedaPorTipo)->paginate(10);
				 		if ($Generacion != "Todas") {
				 		$users = DB::select('SELECT u.id,u.username,u.nombre,u.apPaterno,u.apMaterno,u.tipo,u.status from users u, datos_egresados de where u.id = de.idUsuario AND de.generacion = ?', array($Generacion));
				 		}
				 }

				 elseif ($BusquedaPorStatus != null) { // Busqueda por Status
				 	$users = DB::table('users')->where('status', '=', $BusquedaPorStatus)->paginate(10);
				 }				 				 			 

				 ?>	

				
				
				<?php foreach ($users as $u) {
					
				$idUser = $u->id; 
				$curp = $u->username; 
				$nombreCompleto = $u->nombre." ".$u->apPaterno." ".$u->apMaterno;
				$tipo = $u->tipo;
				$status = $u->status;

				if ($tipo == 1) {
					$tipo = "Administrador";
				}
				elseif ($tipo == 2) {
					$tipo = "Encargado";
				}
				elseif ($tipo == 3) {
					$tipo = "Egresado";
				}
				?>
				
				<tr> 
      				<td><?php 
      					if ( strlen($nombreCompleto) > 50) 
      					{ 
      						echo substr($nombreCompleto, 0, 50) ."&nbsp; [...]";  
      				    }
      				    else
      				    { 
      				    	echo substr($nombreCompleto, 0, 50); 
      				    }
      				    ?>
      				</td> 

    				<td>{{ $curp }}</td> 
    				<td>{{ $tipo }}</td> 
    				<td> <b><?php if($status == 0){ ?> <font color="red">Inactivo</font>
															<?php }elseif($status == 1){ ?> <font color="#04B404">Activo</font>  
									                        <?php }else{?> <font color="#FE642E">Suspendida</font> 
									                        <?php }?> </b>
					</td> 
    				<td>
    					<a href="veUsuario?id=<?php echo $idUser?>"><input type="image" src="images/icn_search.png" title="Ver"></a>
    					<a href="editUsuario?id=<?php echo $idUser?>"><input type="image" src="images/icn_edit.png" title="Editar"></a>
    					<a href="cambiaUsuario?id=<?php echo $idUser?>"><input type="image" src="images/icn_settings.png" title="Activar / Desactivar"></a>
    				</td> 
				</tr>

				<?php } ?>
    	
			</tbody> 
			</table>

		<center><br>
			@if($Generacion == "Todas")
            {{ $users->links() }}
            @endif
        <br>

			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		</article><!-- end of content manager article -->	


        

		<div class="clear"></div>

		<div class="spacer"></div>
	</section>

@stop