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
            {{ Form::open(array('route' => 'trabajo', 'class' => 'form-horizontal')) }}
            <!-- Form Name -->
            <legend>TRABAJO</legend>

            <!-- Text input-->
            <div class="form-group">
                {{ Form::label('empresa', 'Empresa', array('class' => 'control-label')) }}              
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                {{ Form::text('empresa', '', array('class' => 'form-control')) }}
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-xs-6 col-sm-6 col-md-6 col-lg-6 control-label" for=""></label>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                {{ Form::button('Guardar', array('class'=>'btn btn-success', 'type' => 'submit')) }}
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