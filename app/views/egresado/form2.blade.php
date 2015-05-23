<?php $foto = Session::get('foto'); ?>
<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    {{ Form::open(array('action' => 'UserController@saveBasics', 'class' => 'form-horizontal', 'files' => true)) }}
    <!-- Form Name -->
    <legend>INFORMACIÓN DE CONTACTO</legend>

    <div class="form-group"><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    @if(Session::get('mensaje'))
    <!-- Si hay un mensaje, entonces lo imprimimos y le damos estilo con bootstrap -->
    <div class="alert alert-success">{{ Session::get('mensaje') }}</div>
    @elseif(Session::get('alerta'))
    <span class="alert alert-danger">{{ Session::get('alerta') }}</span>
    @endif
    </div></div><br>

    <!-- Text input-->
    <div class="form-group">
        {{ Form::label('telefono', 'Teléfono', array('class' => 'control-label')) }}              
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {{ Form::text('telefono', '', array('class' => 'form-control', 'id' => 'tel')) }}
      </div>
    </div>
    
    <!-- Multiple Radios -->
    <div class="form-group">
        {{ Form::label('radio', 'Tipo Teléfono', array('class' => 'control-label')) }}              
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <label for="radios-0">
                {{ Form::radio('radios', '1', null, ['id' => 'radios-0']) }}
                Casa
            </label>
            <br>
            <label for="radios-1">
                {{ Form::radio('radios', '2', true, ['id' => 'radios-1']) }}
                Celular
            </label>
            <br>
            <label for="radios-2">
                {{ Form::radio('radios', '3', null, ['id' => 'radios-2']) }}
                Otro
            </label>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      {{ Form::label('direccion', 'Dirección', array('class' => 'control-label')) }}
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {{ Form::text('direccion', null, array('class' => 'form-control')) }}
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        {{ Form::label('correo', 'Correo Electrónico', array('class' => 'control-label')) }}
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {{ Form::email('correo', '', ['class' => 'form-control']) }}
      </div>
    </div>

    <!-- Multiple Radios -->
    <div class="form-group">
        {{ Form::label('correo', 'Tipo Correo', array('class' => 'control-label')) }}              
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <label for="radios-0">
                {{ Form::radio('correos', '1', true, ['id' => 'radios-3']) }}
                Personal
            </label>
            <br>
            <label for="radios-1">
                {{ Form::radio('correos', '2', null, ['id' => 'radios-4']) }}
                Trabajo
            </label>
            <br>
            <label for="radios-2">
                {{ Form::radio('correos', '3', null, ['id' => 'radios-5']) }}
                Otro
            </label>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        {{ Form::label('facebook', 'Facebook', array('class' => 'control-label')) }}
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {{ Form::url('facebook', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <!-- Preview --> 
    <div class="form-group">
        {{ Form::label('', '', array('class' => 'control-label')) }}
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="variable">
            @if($foto == '')
            <img id="img_user" src="uploads/perfil/3DtzF0T4ZL6tgD9boZcofl2ZSdHUxWugIGpiGEWg6FyBPfdLBK.jpg" class="img-rounded" width="61%">
            @else
            <img id="img_user" src="{{ $foto }}" class="img-rounded" width="61%">
            @endif
        </div>
    </div>

    <!-- File Button --> 
    <div class="form-group">
        {{ Form::label('ProfilePhoto', '', array('class' => 'control-label')) }}
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="fileUpload btn btn-default btn-sm" id="monitoreo"><span class="glyphicon glyphicon-picture"></span>
            {{ Form::file('ProfilePhoto', array('id' => 'archivo', 'class' => 'upload')) }}
        </div>
        
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-xs-6 col-sm-6 col-md-6 col-lg-6 control-label" for=""></label>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </div>

    {{ Form::close() }}
</div>