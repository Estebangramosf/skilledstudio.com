@section('title') Show @stop
@extends('layouts.app')
@section('content')
  <div class=" page-wrapper{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-9">
            <h1 class="page-header">
              Posts <small>Ver post {{$post->title}}</small>
            </h1>
            <ol class="breadcrumb">
              <li class="active">
                <i class="fa fa-dashboard"></i> Posts
              </li>
            </ol>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- -->
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">

            <div class="list-group">
              <div class="list-group-item">
                <h4>
                  Mostrando post
                  <a href="{{url('/roles/'.$post->id.'/edit')}}" style="float:right;" class="btn btn-primary">Editar</a>

                  <a href="{{url('/roles')}}" style="float:right;" class="btn btn-success">Volver a posts</a>

                </h4>
              </div><!-- /div .list-group-item -->
              <div class="list-group-item">
                <div class="form-group has-feedback has-feedback-left">
                  {{--{!!Form::label('Nombre:')!!}--}}
                  {{--{!!Form::text('posttitle',$parameters = $post->title,['class'=>'form-control', 'disabled'])!!}--}}
                  <h2>{{$post->title}}</h2>
                </div><!-- -->
                <div class="form-group has-feedback has-feedback-left">
                  {{--{!!Form::label('Descripción:')!!}--}}
                  {{--{!!Form::textarea('postbody',$parameters = $post->body,['class'=>'form-control', 'disabled','rows' => '5'])!!}--}}
                  <h4>{{$post->body}}</h4>
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

              @if($c>0)
                <div class="list-group-item">

                  @foreach($comments as $key => $comment)
                    <small style="float: right;">{{$comment->user->name}} comentó</small>
                    <div>
                      <h5>
                        {{--<b>Titulo : </b>--}}
                        <span>{{$comment->title}}</span>
                      </h5>
                    </div>
                    <div>
                      <h6>
                        {{--<b>Comentario : </b>--}}
                        <span>{{$comment->body}}</span>
                      </h6>
                    </div>
                    <hr>
                  @endforeach

                </div><!-- /div .list-group-item -->
              @endif

            </div>
            <div class="list-group">
              <div class="list-group-item">
                <h4>
                  Deja un comentario
                </h4>
              </div><!-- /div .list-group-item -->
              <div class="list-group-item">
                {!!Form::open(['route'=>['posts.comments.store',$post->id], 'method'=>'POST'])!!}
                {!!Form::label('Título')!!}
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::text('title',null,['class'=>'form-control'])!!}
                </div>
                {!!Form::label('Contenido del comentario')!!}
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::textarea('body',null,['class'=>'form-control','rows' => '1'])!!}
                </div>
                  {!!Form::submit('Enviar', ['class'=>'btn btn-success', 'style'=>''])!!}
                {!!Form::close()!!}
              </div><!-- -->
            </div><!-- -->


          </div><!-- -->

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

        </div><!-- -->
      </div><!-- -->
    </div>
  </div><!-- -->
@stop