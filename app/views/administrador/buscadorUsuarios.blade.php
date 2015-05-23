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

</script>

		</h4>

		 <?php if (Session::has('NoSelecciono_Tipo')) {?>
			<h4 class="alert_error">Seleccione un tipo de usuario por favor!</h4>
		 <?php }?>				

		 <?php if (Session::has('NoSelecciono_Status')) {?>
			<h4 class="alert_error">Seleccione un status por favor!</h4>
		 <?php }?>			 

		<!-- INICIO DEL MAIN -->
		<article class="module width_full">
			<header><h3>BUSQUEDA DE USUARIOS</h3></header>
				<div class="module_content"><center>

					<?php $nombreSession = Auth::user()->nombre; // ID del usuario en Session;
					?>


								<form  name ="form1" method="post" action="buscarUsuario">
								<?php if ($idUser =! null) {?>
								<h3> Hola <?php echo $nombreSession; ?> selecciona:</h3>
								<?php } else { echo "<br>";}?>

					 				<b>Buscar USUARIOS por:</b><br><br>
					 				 Nombre:&nbsp;<input type="radio" name="check"  id="check1" value=1 onchange="javascript:showContent()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 CURP:&nbsp;<input type="radio" name="check"  id="check2" value=2 onchange="javascript:showContent()"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Tipo:&nbsp; <input type="radio" name="check"  id="check3" value=3 onchange="javascript:showContent()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Status:&nbsp; <input type="radio" name="check"  id="check4" value=4 onchange="javascript:showContent()" /><br><br><br>

								<div id="content" style="display: none;"> <!-- Palabra Clave -->
					 				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 				<input type="text" id="palabraclave" name="palabraclave" placeholder="Palabra clave dentro del Nombre" maxlength="50" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 				<br><br>
					 			</div>
								

								<div id="content2" style="display: none;"> <!-- CURP -->

									CURP:&nbsp;<input type="text" title="CURP" name="curp" id="curp" placeholder="CURP" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" 
							  					pattern="[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{6}[HM]{1}[A-Z]{5}[A-Z0-9]{2}$"; maxlength="18" required> <br><br>			 			
								</div>

								<div id="content3" style="display: none;"> <!-- Tipo -->
									 <h2><font color="#04B404">Selecciona el tipo:</font></h2>
									 Administrador&nbsp;<input type="radio" name="checkTipo"  id="check5" value=1 onchange="javascript:showContent()"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Encargado&nbsp; <input type="radio" name="checkTipo"  id="check6" value=2 onchange="javascript:showContent()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Egresado&nbsp; <input type="radio" name="checkTipo"  id="check7" value=3 onchange="javascript:showContent()" /><br><br><br>
								</div>		

								<div id="content5" style="display: none;"> <!-- Tipo -->
									 <h2><font color="#04B404">Selecciona la generación a buscar:</font></h2>
 									
 									<select id="generacion" name="generacion">
 										<option value="Todas">Todas</option>
								        <option value="Generación 1">Generación 1 </option>
								        <option value="Generación 2">Generación 2 </option>
								        <option value="Generación 3">Generación 3 </option>
								        <option value="Generación 4">Generación 4 </option>								        
								        <option value="Generación 5">Generación 5 </option>
								        <option value="Generación 6">Generación 6 </option>	
								        <option value="Generación 7">Generación 7 </option>
								        <option value="Generación 8">Generación 8 </option>
								        <option value="Generación 9">Generación 9 </option>
								        <option value="Generación 10">Generación 10 </option>								        
								        <option value="Generación 11">Generación 11 </option>
								        <option value="Generación 12">Generación 12 </option>									        							        
								        <option value="Generación 13">Generación 13 </option>
								        <option value="Generación 14">Generación 14 </option>
								        <option value="Generación 15">Generación 15 </option>
								        <option value="Generación 16">Generación 16 </option>								        
								        <option value="Generación 17">Generación 17 </option>
								        <option value="Generación 18">Generación 18 </option>	
								        <option value="Generación 19">Generación 19 </option>								        								        
								      </select>
								      <br><br>
								</div>									

								<div id="content4" style="display: none;"> <!-- Tipo -->
									 <h2><font color="#04B404">Selecciona el status:</font></h2>
									 Activo&nbsp;<input type="radio" name="checkStatus"  id="check8" value="1" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Inactivo&nbsp; <input type="radio" name="checkStatus"  id="check9" value="0" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Suspendido&nbsp; <input type="radio" name="checkStatus"  id="check10" value="3"/><br><br><br>
								</div>																				



						<br>
						<input id="boton" class="btn" type="submit" value="Buscar"> &nbsp;
						<a class="btn" href="gestionUsuarios">Regresar</a><br>
						</form>		

				</div>
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>	


<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");  // Palabra Clave
        element2 = document.getElementById("content2"); // Curp
        element3 = document.getElementById("content3"); // Tipo
        element4 = document.getElementById("content4"); // Status
        element5 = document.getElementById("content5"); // Seleccionar Generación

		check7 = document.getElementById("check7"); // Tipo Egresado
		check6 = document.getElementById("check6"); 
		check5 = document.getElementById("check5");

        check4 = document.getElementById("check4"); // Status
        check3 = document.getElementById("check3"); // Tipo
        check2 = document.getElementById("check2"); // CURP
        check1 = document.getElementById("check1"); // Palabra Clave



        if (check1.checked){ // Selecciono PALABRA CLAVE
        	element.style.display='inline';
        	element2.style.display='none';
        	element3.style.display='none';
        	element4.style.display='none';
        	element5.style.display='none';
        	document.getElementById('palabraclave').value="";
            document.getElementById('curp').value='GIRM910230HDFCRM00';
            document.getElementById('generacion').value="Todas"; 
        }


        if (check2.checked){ // Selecciono CURP
        	element.style.display='none';
        	element2.style.display='inline';
        	element3.style.display='none';
        	element4.style.display='none';
        	element5.style.display='none';
        	document.getElementById('palabraclave').value="VACIO";
            document.getElementById('curp').value='';
            document.getElementById('generacion').value="Todas";        
        }

        
        if (check3.checked) { // Seleccione Tipo
            element.style.display='none';
            element2.style.display='none';
            element3.style.display='inline';
            element4.style.display='none';
            element5.style.display='none';
        	document.getElementById('palabraclave').value="VACIO";
            document.getElementById('curp').value='GIRM910230HDFCRM00'; 

				        if (check5.checked || check6.checked) { // Seleccione Administrador o Encargado
				            element5.style.display='none';
				            document.getElementById('generacion').value="Todas";           
				        } 

				        if (check7.checked) { // Seleccione Egresado
				            element5.style.display='inline';          
				        }             

        }

        if (check4.checked) { // Seleccione Status
            element.style.display='none';
            element2.style.display='none';
            element3.style.display='none';
            element4.style.display='inline';
            element5.style.display='none';
        	document.getElementById('palabraclave').value="VACIO";
            document.getElementById('curp').value='GIRM910230HDFCRM00';  
            document.getElementById('generacion').value="Todas"; 
            


            
        }
    }
</script>	

@stop