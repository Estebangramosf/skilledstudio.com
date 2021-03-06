@section('title') Galerías @endsection
@extends('layouts.app')
@section('content')
  <div class="{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-header">
              Galerías <small>Contenido público</small>
            </h1>
            <ol class="breadcrumb">
              <li class="active">
                <i class="fa fa-dashboard"></i> Galerías ·
                <a class="btn-link" href="{{url('/galleries/create')}}">Nueva galería</a>
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

            @foreach($galleries as $key => $gallery)

              <div class="list-group">

                <div class="list-group-item">

                  <div class="row">

                    <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">

                      Imagen del post

                    </div>

                    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">

                      <div class="form-group has-feedback has-feedback-left">
                        <h3><a href="{{url('/galleries/'.$gallery->id)}}">{{$gallery->title}}</a></h3>
                      </div><!-- -->
                      <hr>
                      <div class="form-group has-feedback has-feedback-left">
                        <h4>{{$gallery->body}}</h4>
                      </div><!-- -->

                    </div><!-- .col-xs\sm\md\lg-8 -->

                    <div align="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                      <a href="{{url('/galleries/'.$gallery->id.'/edit')}}" style="" class="btn btn-link">Editar</a>
                    </div>
                  </div><!-- .row -->
                </div><!-- .list-group-item -->
                <div class="list-group-item">
                  <small>
                    Publicado por {{$gallery->user->name}}
                    <span style="float:right;">
                      <a href="{{url('/galleries/'.$gallery->id)}}">{{$gallery->created_at}}</a>
                    </span>
                  </small>
                </div>
                <div class="list-group-item">
                  Comentarios
                  <span style="float:right;">

                    {{--
                    DEPRECATED *<25-12-2016
                    {{$count_comments = $gallery->comments->count()}}
                    @if($count_comments>0)
                      <a href="{{url('/posts/'.$post->id)}}">
                        · <small>Ver comentarios</small>
                      </a>
                    @endif
                    --}}

                  </span>
                </div><!-- .list-group-item -->
              </div><!-- .list-group -->
              <hr>
            @endforeach

            {{--
            DEPRECATED *<25-12-2016
            <div class="list-group">
              <div class="list-group-item">
                <h4>
                  <a href="{{url('/posts')}}">Listado de Posts</a>
                  <a href="{{url('/posts/create')}}" style="float:right;" class="btn btn-success">Crear nuevo post</a>
                </h4>

              </div>
              <div class="list-group-item">
                <table class="table">
                  <thead>
                  <th>Titulo</th>
                  <th>Contenido</th>
                  <th>Usuario</th>
                  </thead>
                  @foreach($posts as $post)
                    <tbody>
                    <td>{!!$post->title!!}</td>
                    <td>{!!$post->body!!}</td>
                    <td>{!!$post->user->name!!}</td>
                    <td>
                      {!!link_to_route('posts.edit', $title = 'Editar', $parameters = $post->id, $attributes = ['class'=>'btn btn-primary'])!!}
                    </td>
                    <td>
                      {!!link_to_route('posts.show', $title = 'Ir a ver este post', $parameters = $post->id, $attributes = ['class'=>'btn btn-primary'])!!}
                    </td>
                    </tbody>
                  @endforeach
                </table><!-- -->
          </div>
        </div>
            --}}
          {{$galleries->render()}}
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
@endsection

