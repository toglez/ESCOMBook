@extends('plantilla.masterAdmin')

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
		
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Ultimo Contenido Registrado</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Posts</a></li>
    		<li><a href="#tab2">Comentarios</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>
    				<th>Contenido del Post</th>  
    				<th>Publicado por:</th> 
    				<th>Fecha de Creación</th> 
    				<th>Acciones</th> 
				</tr> 
			</thead> 
			<tbody>
				@foreach($posts as $p)
				<tr> 
      				<td>{{ substr($p->mensaje, 0, 50). '[...]' }}</td> 
    				<td>{{ $p->idUsuario  					   }}</td> 
    				<td><span class="label label-info"></span>{{ $p->updated_at }}</td> 
    				<!-- {{\Carbon\Carbon::createFromTimestamp(strtotime($p->updated_at))->diffForHumans() }} -->
    				<td>{{ HTML::linkAction('PostController@show', 'Leer', array($p->id), array('class' => 'btn btn-default btn-xs')) }}
    					{{ HTML::linkAction('PostController@edit', 'Editar', array($p->id), array('class' => 'btn btn-warning btn-xs')) }}
    					{{ HTML::linkAction('PostController@erase', 'Eliminar', array($p->id), array('class' => 'btn btn-danger btn-xs')) }}
    				</td> 
				</tr>
				@endforeach

			</tbody> 
			</table>
			</div><!-- end of #tab1 -->

			<!-- Pestaña comentarios -->
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Comment</th> 
    				<th>Posted by</th> 
    				<th>Posted On</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Lorem Ipsum Dolor Sit Amet</td> 
    				<td>Mark Corrigan</td> 
    				<td>5th April 2011</td> 
    				<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Ipsum Lorem Dolor Sit Amet</td> 
    				<td>Jeremy Usbourne</td> 
    				<td>6th April 2011</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Sit Amet Dolor Ipsum</td> 
    				<td>Super Hans</td> 
    				<td>10th April 2011</td> 
    				<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Dolor Lorem Amet</td> 
    				<td>Alan Johnson</td> 
    				<td>16th April 2011</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Dolor Lorem Amet</td> 
    				<td>Dobby</td> 
    				<td>16th April 2011</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr> 


			</tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->	



        

		<div class="clear"></div>

		<div class="spacer"></div>
	</section>

@stop