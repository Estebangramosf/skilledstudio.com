@section('title') Showing @stop
@extends('layouts.app')
@section('content')
  <div class=" page-wrapper{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-header">
              Multimedia <small>Ver contenido multimedia · {{$multimedia->title}}</small>
            </h1>
            <ol class="breadcrumb">
              <li class="active">
                <i class="fa fa-dashboard"></i> Multimedia ·
                <a href="{{url('/multimedia')}}" class="btn-link">Volver a contenido multimedia</a>
              </li>
            </ol>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- -->
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="list-group">
              <div class="list-group-item">
                <h4>
                  Mostrando contenido multimedia
                  @if(Auth::check()&&Auth::user()->role!='user'&&Auth::user()->role!='admin'&&$multimedia->user_id==Auth::user()->id)
	                  <a href="{{url('/multimedia/'.$multimedia->id.'/edit')}}" style="float:right;" class="btn-link">Editar</a>
		  @endif
                </h4>
              </div><!-- /div .list-group-item -->
              <div class="list-group-item">
                <div class="form-group has-feedback has-feedback-left">
                  {{-- DEPRECATED *<25-12-2016 --}}
                  {{--{!!Form::label('Nombre:')!!}--}}
                  {{--{!!Form::text('posttitle',$parameters = $post->title,['class'=>'form-control', 'disabled'])!!}--}}
                  <h2>{{$multimedia->title}}</h2>
                </div><!-- -->
                <div class="form-group has-feedback has-feedback-left">
                  {{-- DEPRECATED *<25-12-2016 --}}
                  {{--{!!Form::label('Descripción:')!!}--}}
                  {{--{!!Form::textarea('postbody',$parameters = $post->body,['class'=>'form-control', 'disabled','rows' => '5'])!!}--}}


                </div><!-- -->
              </div><!-- -->
            </div>
            <div class="list-group">
              <div class="list-group-item">
                <h4>
                  Comentarios ·
                  <span style="">{{$c = count($comments)}}</span>
                </h4>
              </div><!-- /div .list-group-item -->




              {{--
              DEPRECATED 25-12-2016--}}
              @if($c>0)
                <div class="list-group-item">
                  @foreach($comments as $key => $comment)
                    <small style="float: right;">{{$comment->user->name}} comentó</small>


                    <div>
                      <h5>
                      <span>{{$comment->title}}</span>
                      </h5>
                    </div>
                    <div>
                      <h6>
                        <span>


                          <?php

                          $comment->body =
                            preg_replace("/((http|https|www)[^\s]+)/",
                              '<a target=\"_blank\" href="$1">$0</a>',
                              $comment->body);
                          $comment->body =
                            preg_replace("/href=\"www/",
                              'href="http://www',
                              $comment->body);
                          $comment->body =
                            preg_replace("/(@[^\s]+)/",
                              '<a target=\"_blank\" href="http://twitter.com/intent/user?screen_name=$1">$0</a>',
                              $comment->body);
                          $comment->body =
                            preg_replace("/( #[^\s]+)/",
                              '<a class="hashtag" target=\"_blank\" href="https://twitter.com/hashtag/$1?src=tren">$0</a>',
                              $comment->body);
                          $comment->body =
                            preg_replace("/( &[^\s]+)/",
                              '<a class="searchTwitter" target=\"_blank\" href="https://twitter.com/search?q=$1">$0</a>',
                              $comment->body);

                          ?>
                          {!!strip_tags($comment->body,'<a>')!!}<!--etiquetas a las que escapa strip_tags-->




                        </span>
                      </h6>
                    </div>

                    @if($key+1 < $comments->count())
                      <hr>
                    @endif

                  @endforeach

                </div><!-- /div .list-group-item -->
              @endif

            </div>
            <div class="list-group">
              @if(Auth::check())
              <div class="list-group-item">
                <h4>
                  Deja un comentario
                </h4>
              </div><!-- /div .list-group-item -->
              <div class="list-group-item">
                {!!Form::open(['route'=>['multimedia.comments.store',$multimedia->id], 'method'=>'POST', 'id'=>'formMultimediaComments'])!!}
                {!!Form::label('Título')!!}
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::text('title',null,['class'=>'form-control form-comment-input'])!!}
                </div>
                {!!Form::label('Contenido del comentario')!!}
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::textarea('body',null,['class'=>'form-control form-comment-input','rows' => '1'])!!}
                </div>
                {!!Form::submit('Enviar', ['class'=>'btn btn-success send-multimedia', 'style'=>''])!!}
                {!!Form::close()!!}
              </div><!-- -->
              @else
                Para dejar un comentario debes iniciar sesión.
              @endif
            </div><!-- -->


          </div><!-- -->

          {{--
          DEPRECATED 25-12-2016
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="list-group">
              <div class="list-group-item">
                Espacio publicitario
              </div><!-- -->
              <div class="list-group-item">
                Sugerencias, relateds, etc.
              </div><!-- -->
            </div><!-- -->
          </div><!-- -->
          --}}

        </div><!-- -->
      </div><!-- -->
    </div>
  </div><!-- -->
@stop