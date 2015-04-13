@extends('muro.master')

@section('css')
	<link href="{{ asset('assets/css/blog-home.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/seo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vistaMuro.css') }}" rel="stylesheet" media="screen">
    <script type="text/javascript">
    // for the post and comments
    /*
        $(document).on('click', '#post', function(){
            var feed = $('#feedbox').val()
            if(!feed)
                alert('Ups, you still write anything yet!');
            else{
                $('<div id="feed"><div class="row">\
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">\
                        <img src="images/Motiva.jpg" class="img-circle" width="100%" alt="">\
                    </div>\
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">\
                        <div><b>Some Name</b>\
                            <div class="pull-right text-muted" id="delete">Delete</div>\
                        </div>\
                        <div>'+feed+'</div>\
                        <div class="text-muted"><small>{{ \Carbon\Carbon::now(); }}</small></div>\
                    </div>\
                </div><hr>\
                </div>').insertAfter("#insert").hide().slideDown();
                $('#feedbox').val('');
            }
        });

        //for delete button
        $(document).on('click', '#delete', function(){
            $(this).closest('#feed').slideUp();
        });
*/
    </script>
    <script>
        function ConfirmDelete(){
            var x = confirm("Are you sure you want to delete?");
            if(x)
                return true;
            else
                return false;
        }
    </script>
@stop

@section('contenido')
	<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <img src="images/Motiva.jpg"  width="100%" alt="">
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        {{ Form::open(array('action' => 'PostController@store')) }} 
                            {{ Form::hidden('created_by', Auth::user()->id) }}
                            {{ Form::textarea('feedbox', null, array('class' => 'form-control', 'id' => 'feedbox', 'placeholder' => 'Escribe algo...', 'rows' => '3')) }}<br>
                            {{ Form::submit('Publicar Post', array('class' => 'btn btn-primary btn-sm', 'id' => 'post')) }}
                        {{ Form::close() }}
                        
                    </div>
                    
                </div>
                <hr>
                <!-- Comentarios -->
                <div id="insert"></div>
                <!-- From database -->
                <!-- Second -->

                @foreach ($posts as $post)

                <div class="row" id="feed">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <img src="images/Motiva.jpg" class="img-circle" width="100%" alt="">
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <div><b>{{ $post->id }}</b>
                            <!-- Menu Derecho -->
                            @if(Auth::user()->tipo == '1' || Auth::user()->tipo == '2')
                            <!-- Los admin y encargados momentaneamente pueden editar de todos -->
                            <div class="pull-right" id="delete">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><img src="images/flecha-opc.png" class="img-circle" width="100%" alt=""></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a data-toggle="modal" data-idpublicacion="{{ $post->id }}" data-mensaje="{{ $post->mensaje }}" class="open-Modal" href="#editar">Editar</a></li>
                                    </ul>
                            </div>
                            <div class="pull-right">
                                {{ Form::open(array('action' => 'PostController@delete')) }} 
                                {{ Form::hidden('invisible', $post->id) }}
                                {{ Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('class'=>'btn btn-default btn-sm', 'aria-label' => 'Borrar', 'type'=>'submit')) }}
                                {{ Form::close() }}
                            </div>
                            @elseif($post->permiso == '3')
                                @if($post->idUsuario == Auth::user()->id)
                                <div class="pull-right" id="delete">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><img src="images/flecha-opc.png" class="img-circle" width="100%" alt=""></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a data-toggle="modal" data-idpublicacion="{{ $post->id }}" data-mensaje="{{ $post->mensaje }}" class="open-Modal" href="#editar">Editar</a></li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    {{ Form::open(array('action' => 'PostController@delete')) }} 
                                    {{ Form::hidden('invisible', $post->id) }}
                                    {{ Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('class'=>'btn btn-default btn-sm', 'aria-label' => 'Borrar', 'type'=>'submit')) }}
                                    {{ Form::close() }}
                                </div>
                                @endif
                            @endif
                        </div>
                        <div>{{ $post->mensaje }}</div>

                        <!-- <div class="text-muted"><small>{{ \Carbon\Carbon::now(); }}</small></div> -->
                        <div class="text-muted"><small>{{ $post->updated_at }}</small></div>
                    </div>

                </div>
                <hr>

                @endforeach
            </div>


                <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"> <center>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                                <h4>Editar Publicación</h4>
                            </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="actualizar">
                                        <input name="idpublicacion" id="ID2" alight="center" readonly size="1"></input>
                                        <textarea class="form-control" rows="3" name="mensaje" id="MENSAJE" value=""></textarea>
                                     <div class="modal-footer">
                                                <input type="submit" class="btn" value="Actualizar Post">
                                                <a href="#" data-dismiss="modal" class="btn btn-default">Cancelar</a>
                                     </div>
                                </div>
                        </div>
                    </div>
                </div>       


                <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminar" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"> <center>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" area-hidden="true">&times;</button>
                                <h4>Eliminar Publicación</h4>
                            </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="eliminar">
                                        <h4>¿Estas seguro de querer eliminar el post?
                                        <input name="idpost" id="ID" alight="center" readonly size="1"></input><br>
                                        </h4>
                                     <div class="modal-footer">
                                                <input type="submit" class="btn btn-success" value="Eliminar Post">
                                                <a href="#" data-dismiss="modal" class="btn btn-default">Cancelar</a>
                                     </div>
                                </div>
                        </div>
                    </div>
                </div>   








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





            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

@stop

@section('js')
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
@stop