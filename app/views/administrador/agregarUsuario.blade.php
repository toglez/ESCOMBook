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

		<!-- INICIO DEL MAIN -->
		<article class="module width_full">
			<header><h3>AGREGAR NUEVO USUARIO</h3></header>
				<div class="module_content"><center>

					<?php $nombreSession = Auth::user()->nombre; // ID del usuario en Session;
					?>


								<form  name ="form1" method="post" action="agregarNuevoUsuario">
								<?php if ($idUser =! null) {?>
								<h3> Hola <?php echo $nombreSession; ?> ingresa los datos del nuevo usuario:</h3>
								<?php } else { echo "<br>";}?>

					 				<h4>
									Nombre(s):&nbsp;<input type="text" name="nombre" placeholder="Nombre"  pattern="[A-Za-z]{1}[A-Za-z-éíó\s]*$"; maxlength="50" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 				Apellido Paterno:&nbsp; <input type="text" name="apPaterno" placeholder="Apellido Paterno" pattern="[A-Za-z]{1}[A-Za-z\s]*$"; maxlength="40" required><br><br>
					 				Apellido Materno:&nbsp;<input type="text" name="apMaterno" placeholder="Apellido Materno"  pattern="[A-Za-z]{1}[A-Za-z\s]*$"; maxlength="40" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									

							  		CURP:&nbsp;<input type="text" title="CURP" name="username" placeholder="CURP" size="30"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" 
							  					pattern="[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{6}[HM]{1}[A-Z]{5}[A-Z0-9]{2}$"; maxlength="18" required> <br><br><br>

					 				<b>Tipo</b><br><br>
					 				 Administrador:&nbsp;<input type="radio" name="check"  id="check1" value=1 onchange="javascript:showContent()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Encargado:&nbsp;<input type="radio" name="check"  id="check2" value=2 onchange="javascript:showContent()"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Egresado:&nbsp; <input type="radio" name="check"  id="check3" value=3 onchange="javascript:showContent()" /><br><br>

								<div id="content" style="display: none;">
					 				Boleta:&nbsp; <input type="text" id="boleta" name="boleta" placeholder="Boleta"  value="0000000000" pattern="[0-9]*$" maxlength="10" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 				
					 				Generación:&nbsp;

								      <select class="form-control" id="generacion" name="generacion" required>
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
								</div><br><br>



						<br>
						<input id="boton" class="btn" type="submit" value="Agregar"> &nbsp;
						<a class="btn" href="administrador">Regresar</a><br>
						</form>		

				</div>
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>	


<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check3 = document.getElementById("check3");
        check2 = document.getElementById("check2");
        check1 = document.getElementById("check1");
        
        if (check3.checked) {
            element.style.display='inline';
            document.getElementById('boleta').value='';
            document.getElementById('generacion').value='';

        }
        
        if (check2.checked || check1.checked){
        	element.style.display='none';
        	document.getElementById('boleta').value="0000000000";
        	document.getElementById('generacion').value='Generación 1';
        }

    }
</script>	





@stop