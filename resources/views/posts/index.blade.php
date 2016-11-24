@section('title') Posts @endsection
@extends('layouts.app')
@section('content')
  <div class="page-wrapper{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="contentMiddle">
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            @include('alerts.allAlerts')
          </div><!-- -->
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

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
                    <td>{!!link_to_route('posts.edit', $title = 'Editar', $parameters = $post->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
                    </tbody>
                  @endforeach
                </table><!-- -->
                {{--{!!$roles->render()!!}--}}
              </div>
            </div>

          </div><!-- -->

        </div><!-- -->
      </div><!-- -->
    </div>

  </div><!-- -->
@endsection

