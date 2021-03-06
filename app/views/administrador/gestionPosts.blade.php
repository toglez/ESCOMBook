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
			<br><p align="right"><a href="buscador" type="button" class="btn btn-default">Busqueda</a></p>
	    </div><br><br><br>

		 <?php if (Session::has('editarPost_index')) {?>
			<h4 class="alert_success">Post Actualizado Correctamente!</h4>
		 <?php }?>	

		 <?php if (Session::has('eliminarPost_index')) {?>
			<h4 class="alert_success">Post Eliminado Correctamente!</h4>
		 <?php }?>	

		<?php if (Session::has('eliminarComentario_index')) {?>
			<h4 class="alert_success">Comentario Eliminado Correctamente!</h4>
		 <?php }?>
		 		
		
<article class="module width_3_quarter">
		<header><h3 class="tabs_involved"><b>Posts Registrados</b></h3>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					 
    				<th>Contenido del Post</th>  
    				<th>Publicado por:</th> 
    				<th>Última fecha de actualización</th> 
    				<th>Acciones</th> 
				</tr> 
			</thead> 
			<tbody> 
				<?php  
				//$posts = Post::orderBy('updated_at','desc')->paginate(11);
				//$posts = DB::select('SELECT u.id as idusuario,p.id,mensaje,u.nombre,u.apPaterno,p.updated_at from post p, users u where u.id = p.idUsuario ORDER BY updated_at desc')->paginate(5);
				?>
				@foreach($posts as $p) 
				<?php $datos = DB::select('SELECT id,nombre,apPaterno from users  where id = ?', array($p->idUsuario));  ?>
				
				<?php foreach ($datos as $dato) {
				$nombreUser = $dato->nombre;
				$apellidoUser = $dato->apPaterno;
				$idUser = $dato->id; 

				}?>
				
				<tr> 
      				<td><?php 
      					if ( strlen($p->mensaje) > 45) 
      					{ 
      						echo substr($p->mensaje, 0, 45) ."&nbsp; [...]";  
      				    }
      				    else
      				    { 
      				    	echo substr($p->mensaje, 0, 45); 
      				    }
      				    ?>
      				</td> 

    				<td>{{ $nombreUser ." ". $apellidoUser }}</td> 
    				<td><span class="label label-info"></span>{{ $p->updated_at }}</td> 
    				<td>
    					<a href="vePost2?id=<?php echo $idUser?>&id2=<?php echo $p->id?>"><input type="image" src="images/icn_search.png" title="Ver"></a>
    					<a href="editPost2?id=<?php echo $idUser?>&id2=<?php echo $p->id?>"><input type="image" src="images/icn_edit.png" title="Editar"></a>
    					<a href="eliminaPost2?id=<?php echo $idUser?>&id2=<?php echo $p->id?>"><input type="image" src="images/icn_trash.png" title="Eliminar"></a>
    				</td> 
				</tr>

				@endforeach		
    	
			</tbody> 
			</table>

		<center><br>
            {{ $posts->links() }}
        <br>

			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		</article><!-- end of content manager article -->	


        

		<div class="clear"></div>

		<div class="spacer"></div>
	</section>

@stop