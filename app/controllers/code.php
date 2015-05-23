	http://laravel.com/api/4.2/Illuminate/Routing/Route.html
	http://codehero.co/laravel-4-desde-cero-filtros-parte-i/
	http://laraveles.com/foro/viewtopic.php?id=2405
	
	{{ Form::textarea('commentbox', null, array('class' => 'form-control', 'id' => 'commentbox', 'placeholder' => 'Escribe tu comentario...', 'rows' => '1', 'onkeypress' => 'return chkComment(event)')) }}
	<span class="input-group-btn">
		{{ Form::button('<i class="glyphicon glyphicon-camera"></i>', array('type' => 'submit', 'class' => 'btn btn-default', 'onClick' => 'return chkComment()')) }}
	</span>

{{ HTML::script('js/antonio.js') }}

<script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function() {
        document.getElementById("uploadFile").value = this.value;
    };
</script>

<script>
    //Este string contiene una imagen de 1px*1px color blanco. y no la utilizo
    window.imagenVacia = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

    window.mostrarVistaPrevia = function mostrarVistaPrevia() {

        var Archivos, Lector;

        //Para navegadores antiguos
        if (typeof FileReader !== "function") {
            alert('Vista previa no disponible' + ' su navegador no soporta vista previa!');
            return;
        }

        Archivos = jQuery('#archivo2')[0].files;
        if (Archivos.length > 0) {

            Lector = new FileReader();
            Lector.onloadend = function(e) {
                var origen, tipo;

                //Envia la imagen a la pantalla
                origen = e.target; //objeto FileReader
                //Prepara la información sobre la imagen
                tipo = window.obtenerTipoMIME(origen.result.substring(0, 30));
                //sino muestra un mensaje 
                if (tipo !== 'image/jpeg' && tipo !== 'image/png' && tipo !== 'image/gif') {
                    jQuery('#img_C').attr('src', window.imagenVacia);
                    alert('El formato de imagen no es válido: debe seleccionar una imagen JPG, PNG o GIF.');
                } else {
                    jQuery('#img_C').attr('src', origen.result);
                    jQuery('#img_C').attr('width', 100);
                    
                }

            };
            Lector.onerror = function(e) {
                console.log(e)
            }
            Lector.readAsDataURL(Archivos[0]);

        } else {
            var objeto = jQuery('#archivo2');
            objeto.replaceWith(objeto.val('').clone());
            jQuery('#img_C').attr('src', window.imagenVacia);
        };


    };

    //Lee el tipo MIME de la cabecera de la imagen. la necesito para obtener el tipo de imagen
    window.obtenerTipoMIME = function obtenerTipoMIME(cabecera) {
        return cabecera.replace(/data:([^;]+).*/, '\$1');
    }

    jQuery(document).ready(function() {

        //El input del archivo lo vigilamos con un "delegado"
        jQuery('#monitoreo2').on('change', '#archivo2', function(e) {
            window.mostrarVistaPrevia();
        });

        //El botón Cancelar lo vigilamos normalmente
        jQuery('#cancelar').on('click', function(e) {
            var objeto = jQuery('<div id="archivo2"></div>');
            objeto.replaceWith(objeto.val('').clone());

            //jQuery('#img_user').attr('src', window.imagenVacia);
        });
        $('#previewC').css('visibility', 'visible');
    });
</script>

, 'name' => 'tels[]'

foreach ($input as $i) {
                //$all = $all . $i . "<br>";
                if($x < 6){
                    foreach($tel as $t) {
                        if($x % 2 == 0){
                            $t->telefono      = $i;
                            $all = $all . $i . "<br>";
                        }else{
                            $t->tipoTelefono  = $i;
                            $all = $all . $i . "<br>";
                        }
                    }
                    if($x % 2 == 0){
                        $t              = new Telefono;
                        $t->idUsuario   = Auth::user()->id;
                        $t->telefono    = $i;
                        $all = $all . $i . "<br>";
                    }else{
                        $t->tipoTelefono  = $i;
                        $all = $all . $i . "<br>";
                    }

                }else{
                    $all = $all . $i . "<br>";  
                }
                
                // if($x == 0)
                //  $tel->telefono      = $i;
                // elseif($x == 1)
                //  $tel->tipoTelefono  = $i;
                // elseif($x == 3)
                //  $correo->correo     = $i;
                // elseif($x == 4)
                //  $correo->tipoCorreo = $i;
                $x++;
            }

            if($x < 6){//Estos son los primeros telefonos
                    while($aux2 < $tam){
                        if($x == 0){
                            $x++;
                            $tel[0]->telefono     = $i;
                            $all = $all . $i . "<br>";
                            continue;
                        }elseif($x == 1){
                            $x++;
                            $aux2++;
                            $tel[0]->tipoTelefono = $i;
                            $all = $all . $i . "<br>";
                            continue;
                        }elseif($x == 2){
                            $x++;
                            $tel[1]->telefono     = $i;
                            $all = $all . $i . "<br>";
                            continue;
                        }elseif($x == 3){
                            $x++;
                            $aux2++;
                            $tel[1]->tipoTelefono = $i;
                            $all = $all . $i . "<br>";
                            continue;
                        }elseif($x == 4){
                            $x++;
                            $tel[2]->telefono     = $i;
                            $all = $all . $i . "<br>";
                            continue;
                        }elseif($x == 5){
                            $x++;
                            $aux2++;
                            $tel[2]->tipoTelefono = $i;
                            $all = $all . $i . "<br>";
                            continue;
                        }
                    }//Fin mientras no hayas recorrido todo el arreglo de telefonos
                    if($x == 2){
                        $x++;
                        $tel            = new Telefono;
                        $tel->idUsuario = Auth::user()->id;
                        $tel->telefono  = $i;
                        $all = $all . $i . "<br>";
                        continue;
                    }elseif($x == 3){
                        $x++;
                        $tel->tipoTelefono = $i;
                        $all = $all . $i . "<br>";
                        continue;
                    }elseif($x == 4){
                        $x++;
                        $tel            = new Telefono;
                        $tel->idUsuario = Auth::user()->id;
                        $tel->telefono  = $i;
                        $all = $all . $i . "<br>";
                        continue;
                    }elseif($x == 5){
                        $x++;
                        $tel->tipoTelefono = $i;
                        $all = $all . $i . "<br>";
                        continue;
                    }
                }//Fin menor que 6. Fin telefonos. Comienza correos

            trabajo.blade.php
            <!-- Select Estados -->
            <div class="form-group">
                {{ Form::label('estado', 'Estado', array('class' => 'control-label')) }} 
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    {{ Form::select('estado', array('default' => 'Selecciona una opción') + $estados, Input::old('estado') ? Input::old('estado') : 'default') }}
                </div>
            </div>

            @if(isset($municipios))
                <!-- Mostrar el select con los municipios
                para esto debe haber un submit por cada onchange en los
                select. El problema que encontre fue solamente asignar la ruta para ello -->
            <div class="form-group">
                {{ Form::label('municipio', 'Municipio', array('class' => 'control-label')) }} 
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    {{ Form::select('municipio', array('default' => 'Selecciona una opción') + $municipios, 'default') }}
                </div>
            </div>
            @endif

            @if(isset($localidades))
            <div class="form-group">
                {{ Form::label('localidades', 'Localidad', array('class' => 'control-label')) }} 
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    {{ Form::select('localidad', array('default' => 'Selecciona una opción') + $localidad, 'default') }}
                </div>
            </div>
            @endif