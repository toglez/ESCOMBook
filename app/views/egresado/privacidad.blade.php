@extends('plantilla.masterPerfil')

@section('css')
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/bootstrap-theme.css') }}
{{ HTML::style('assets/css/form.css') }}
@stop

@section('content')
    <!-- Page Content -->
    <section id="main" class="column">
    <br>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            {{ Form::open(array('route' => 'privacidad', 'class' => 'form-horizontal')) }}
            <!-- Form Name -->
            <legend>CAMBIAR CONTRASEÑA</legend>
            
            <div class="form-group"><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @if(Session::get('mensaje'))
            <!-- Si hay un mensaje, entonces lo imprimimos y le damos estilo con bootstrap -->
            <div class="alert alert-success">{{ Session::get('mensaje') }}</div>
            @elseif(Session::get('alerta'))
            <span class="alert alert-danger">{{ Session::get('alerta') }}</span>
            @endif
            </div></div><br>

            <!-- Verificamos si hubo algún error en el campo -->
            @if( $errors->has('mensaje') )          
            <!-- En caso de que haya un error, entonces los imprimos y utilizamos algún estilo de bootstrap -->
            <span class="alert alert-danger">
            @foreach($errors->get('mensaje') as $error )   
                * {{ $error }}</br>
            @endforeach
            </span>
            @endif

            <div class="form-group">
                {{ Form::label('password', 'Contraseña Actual', array('class' => 'control-label')) }}
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    {{ Form::password('password', array('class' => 'form-control', 'pattern' => '[A-Za-z0-9\S].{6,20}', 'title' => 'De 6 a 20 caracteres', 'required')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('newPassword', 'Contraseña Nueva', array('class' => 'control-label')) }}
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    {{ Form::password('newPassword', array('class' => 'form-control', 'pattern' => '[A-Za-z0-9\S].{6,20}', 'title' => 'De 6 a 20 caracteres', 'required')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('confirmPassword', 'Repite la Contraseña', array('class' => 'control-label')) }}
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    {{ Form::password('confirmPassword', array('class' => 'form-control', 'pattern' => '[A-Za-z0-9\S].{6,20}', 'title' => 'De 6 a 20 caracteres', 'required')) }}
                </div>
            </div>

            <div class="form-group" id="aviso" style="display: none">
                <label class="col-xs-6 col-sm-6 col-md-6 col-lg-6 control-label" for=""></label>
                <span class="col-xs-6 col-sm-6 col-md-6 col-lg-6 alert alert-error">Las contraseñas deben coincidir</span>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label" for=""></label>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                {{ Form::button('Guardar', array('class'=>'btn btn-success', 'type'=>'submit', 'id' => 'pass')) }}
              </div>
            </div>

            {{ Form::close() }}
        </div>
            

    </section>

@stop

@section('js')
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
{{ HTML::script('js/antonio.js') }}

<script type="text/javascript">                                 // BORRAR 
    $(document).on("click", ".open-Modal", function () { 
        var id = $(this).data('idpost');         
        var valorMensaje = $(this).data('mensaje'); 
        var idpub = $(this).data('idpublicacion');
        $(".modal-body #ID").val( id );         
        $(".modal-body #MENSAJE").val( valorMensaje );
        $(".modal-body #ID2").val( idpub );
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("textarea").keydown(function(event){
        var message = $(this).val();
        if(event.which == 13){
            if($.trim(message) != ""){
                //alert(message);
                $(this.form).submit();
                //return true;
            }else{
                alert("This field can't be left empty");                
            }
            $("textarea").val('');
            return false;
        }
    });
});
</script>

@stop