@extends('master')

@section('css')
	<link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/seo.css') }}" rel="stylesheet">
@stop

@section('contenido')
	<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-6">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

				<!-- Comments del Brandon -->
				<section id="listcomment">
					<article>
						<div id="comments" class="comments-area comments-warp">
							<div class="comments">
								<ol class="media-list">
									<li class="comment">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                <img alt="" src="C:\Users\Toño\Desktop/Motiva.jpg" class="" height="80" width:"80">
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                                <div class="author-comments">
                                                    <a href="index">Antonio</a>
                                                </div>
                                                <div class="comments">
                                                    <p>Un artículo súper completo! Me interesa sobre todo el tema de bloquear referrals. Hay mucho pesado tipo semalt y este tipo de webs que hacen que me salga urticaria cuando veo las veces que me ”visitan”.</p>
                                                    <p>Gracias y saludos ;)</p>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 date-comments noleftpad">
                                                    <abbr class="published" title="2015-03-15T16:41">marzo 15, 2015 @ 4:41 pm</abbr>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right reply-comments">
                                                    <i class="fa fa-reply"></i>
                                                    <a href="index.php" class="comment-reply-link" onclick="return addComment.moveForm()">Responder</a>
                                                </div>
                                            </div>
                                        </div>   
                                        <!-- Respuestas -->
                                        <ol class="children">
                                            <li class="comment byuser commnet-author-bdiazp bypostauthor odd alt depth-1 comment-content" id="li-comment-2476">
                                               <div class="row">
                                                   <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                <img src="C:\xampp\htdocs\nombreproyecto\public/Motiva.jpg" height="80" width:"80">
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                                <div class="author-comments">
                                                    <a href="index">Egresado</a>
                                                </div>
                                                <div class="comments">
                                                    <p>Este es un fucking respuesta de post.</p>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 date-comments noleftpad">
                                                    <abbr class="published" title="2015-01-24T19:08">enero 24, 2015 @ 7:08 pm</abbr>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right reply-comments">
                                                    <i class="fa fa-reply"></i>
                                                    <a href="index.php" class="comment-reply-link" onclick="return addComment.moveForm()">Responder</a>
                                                </div>
                                            </div>
                                               </div> 
                                            </li>
                                        </ol>                        
                                    </li>
								</ol>
							</div>
						</div>
					</article>
				</section>
				
                <!-- First Blog Post -->
                <h2>
                    <a href="#">Nombre del Post</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Toño González</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> 4 Marzo</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Second Blog Post -->
                <h2>
                    <a href="#">Title2</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Third Blog Post -->
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

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
@stop