@section('title') Show @stop
@extends('layouts.app')
@section('content')
  <div class=" page-wrapper{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="contentMiddle">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- -->
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

            <div class="list-group" >
              <div class="list-group-item">
                <h4>
                  Mostrando post
                  <a href="{{url('/roles/'.$post->id.'/edit')}}" style="float:right;" class="btn btn-primary">Editar</a>

                  <a href="{{url('/roles')}}" style="float:right;" class="btn btn-success">Volver al listado</a>

                </h4>
              </div><!-- /div .list-group-item -->
              <div class="list-group-item">
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::label('Nombre:')!!}
                  {!!Form::text('posttitle',$parameters = $post->title,['class'=>'form-control', 'disabled'])!!}
                </div><!-- -->
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::label('Descripción:')!!}
                  {!!Form::textarea('postbody',$parameters = $post->body,['class'=>'form-control', 'disabled','rows' => '5'])!!}
                </div><!-- -->
              </div><!-- -->
              <div class="list-group-item">
                <h4>
                  Comentarios
                  <span style="float:right;">{{$c = count($comments)}}</span>
                </h4>
              </div><!-- /div .list-group-item -->

              @if($c>0)
                <div class="list-group-item">

                  @foreach($comments as $key => $comment)
                    <small style="float: right;">El usuario {{$comment->user->name}} comentó</small>
                    <div>
                      <h6>
                        <b>Titulo : </b>
                        <span>{{$comment->title}}</span>
                      </h6>
                    </div>
                    <div>
                      <h6>
                        <b>Comentario : </b>
                        <span>{{$comment->body}}</span>
                      </h6>
                    </div>
                    <hr>
                  @endforeach

                </div><!-- /div .list-group-item -->
              @endif

              <div class="list-group-item">
                <h6>
                  Deja un comentario
                </h6>
              </div><!-- /div .list-group-item -->
              <div class="list-group-item">
                {!!Form::open(['route'=>['posts.comments.store',$post->id], 'method'=>'POST'])!!}
                  {!!Form::text('title',null,['class'=>'form-control'])!!}
                  {!!Form::textarea('body',null,['class'=>'form-control','rows' => '1'])!!}
                  {!!Form::submit('Enviar', ['class'=>'btn btn-success', 'style'=>''])!!}
                {!!Form::close()!!}
              </div><!-- -->
            </div><!-- -->


          </div><!-- -->
        </div><!-- -->
      </div><!-- -->
    </div>
  </div><!-- -->
@stop