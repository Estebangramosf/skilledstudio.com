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
              Posts <small>Ver post · {{$post->title}}</small>
            </h1>
            <ol class="breadcrumb">
              <li class="active">
                <i class="fa fa-dashboard"></i> Posts ·
                <a href="{{url('/posts')}}" class="btn-link">Volver al listado</a>
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
                  Mostrando post · {{$post->title}}
                  <a href="{{url('/posts/'.$post->id.'/edit')}}" style="float:right;" class="btn-link">Editar</a>
                </h4>
              </div><!-- /div .list-group-item -->

              <div class="list-group-item">
                  @foreach($post->image as $key => $image)

                    <a href="#!" class="thumbnail" style="padding:0px;">
                      {{Html::image('/posts_images/'.$image->image,
                        $alt="Photo", $attributes = array('style'=>
                        'width:auto;height:auto;max-width:100%;', 'class'=>'img-responsive')) }}
                    </a>

                  @endforeach
                  @if(count($post->image)==0)
                    <a href="#!" class="thumbnail" style="padding:0px;">
                      {{Html::image('/img/backgrounds/iconoCargando.gif',
                        $alt="Photo", $attributes = array('style'=>
                        'width:100%;height:100%;max-width:300px;max-height:300px;')) }}
                      <div class="caption">
                        Este post no tiene imagen.
                      </div>
                    </a>
                  @endif
              </div>
              <div class="list-group-item">
                <div class="form-group has-feedback has-feedback-left">
                  {{-- DEPRECATED *<25-12-2016 --}}
                  {{--{!!Form::label('Nombre:')!!}--}}
                  {{--{!!Form::text('posttitle',$parameters = $post->title,['class'=>'form-control', 'disabled'])!!}--}}
                  <h2>{{$post->title}}</h2>
                </div><!-- -->
                <div class="form-group has-feedback has-feedback-left">
                  {{-- DEPRECATED *<25-12-2016 --}}
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