@extends('plantilla.masterAdmin')

@section('content')
	<section id="main" class="column">
		
		<h4 class="alert_info">¡Bienvenido! 

<script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
var f=new Date();
document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
</script>

<div id="reloj"></div>

		</h4>
		
		<article class="module width_full">
			<header><h3>Estadisticas</h3></header>
			<div class="module_content">
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Usuarios</p>
						
						<p class="overview_count">5,876</p>
						<p class="overview_type">Pre-registrados</p>
						
						<p class="overview_count">1,876</p>
						<p class="overview_type">Activos</p>						
					
					</div>
					<div class="overview_previous">
						<p class="overview_day">Contenido</p>

						<p class="overview_count">1,646</p>
						<p class="overview_type">Publicaciones</p>

						<p class="overview_count">2,054</p>
						<p class="overview_type">Comentarios</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
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
				<tr> 
      				<td>Murio el perro Aguayo, que gran tragedia.</td> 
    				<td>Antonio Gonzales</td> 
    				<td>06/04/15 15:10</td> 
    				<td><input type="image" src="images/icn_ver.png" title="Ver">
    					<input type="image" src="images/icn_edit.png" title="Editar">
    					<input type="image" src="images/icn_trash.png" title="Eliminar">    					  					
    				</td> 
				</tr> 

				<tr> 
      				<td>Murio el perro Aguayo, que gran tragedia.</td> 
    				<td>Antonio Gonzales</td> 
    				<td>06/04/15 15:10</td> 
    				<td><input type="image" src="images/icn_ver.png" title="Ver">
    					<input type="image" src="images/icn_edit.png" title="Editar">
    					<input type="image" src="images/icn_trash.png" title="Eliminar">    					  					
    				</td>  
				</tr> 

				<tr> 
      				<td>Murio el perro Aguayo, que gran tragedia.</td> 
    				<td>Antonio Gonzales</td> 
    				<td>06/04/15 15:10</td> 
    				<td><input type="image" src="images/icn_ver.png" title="Ver">
    					<input type="image" src="images/icn_edit.png" title="Editar">
    					<input type="image" src="images/icn_trash.png" title="Eliminar">    					  					
    				</td>  
				</tr> 

				<tr> 
      				<td>Murio el perro Aguayo, que gran tragedia.</td> 
    				<td>Antonio Gonzales</td> 
    				<td>06/04/15 15:10</td> 
    				<td><input type="image" src="images/icn_ver.png" title="Ver">
    					<input type="image" src="images/icn_edit.png" title="Editar">
    					<input type="image" src="images/icn_trash.png" title="Eliminar">    					  					
    				</td>  
				</tr> 

				<tr> 
      				<td>Murio el perro Aguayo, que gran tragedia.</td> 
    				<td>Antonio Gonzales</td> 
    				<td>06/04/15 15:10</td> 
    				<td><input type="image" src="images/icn_ver.png" title="Ver">
    					<input type="image" src="images/icn_edit.png" title="Editar">
    					<input type="image" src="images/icn_trash.png" title="Eliminar">    					  					
    				</td> 
				</tr> 

				<tr> 
      				<td>Murio el perro Aguayo, que gran tragedia.</td> 
    				<td>Antonio Gonzales</td> 
    				<td>06/04/15 15:10</td> 
    				<td><input type="image" src="images/icn_ver.png" title="Ver">
    					<input type="image" src="images/icn_edit.png" title="Editar">
    					<input type="image" src="images/icn_trash.png" title="Eliminar">    					  					
    				</td> 
				</tr> 				

			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
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
		
		
		
		
		<article class="module width_full">
			<header><h3>Ultimas Imagenes Publicadas</h3></header>
				<div class="module_content">

	<a class="group1" href="images/repositorio/1.jpg">
	    <img src="images/repositorio/1.jpg" height="120" width="240"/>
	</a>
	
		<a class="group1" href="images/repositorio/2.jpg">
	    <img src="images/repositorio/2.jpg" height="120" width="240"/>
	</a>
	
		<a class="group1" href="images/repositorio/3.jpg">
	    <img src="images/repositorio/3.jpg" height="120" width="240"/>
	</a><br><br><br>


				</div>
		</article><!-- end of styles article -->


		<div class="spacer"></div>
	</section>

@stop