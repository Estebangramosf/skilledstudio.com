@section('title') Usuarios @endsection
@extends('layouts.app')
@section('content')
  <div class=" page-wrapper{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-header">
              Admin <small>Administrador de usuarios</small>
            </h1>
            <ol class="breadcrumb">
              <li class="active">
                <i class="fa fa-dashboard"></i> Usuarios
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
                  Listado de Usuarios
                  {{--<a href="{{url('/roles/create')}}" style="float:right;" class="btn btn-success">Crear nuevo rol</a>--}}
                </h4>

              </div>
              <div class="list-group-item">
                <table class="table">
                  <thead>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Rol</th>
                  </thead>
                  @foreach($users as $user)
                    <tbody>
                    <td><a href="{{url('#!')}}">{!!$user->name!!}</a></td>
                    <td>{!!$user->email!!}</td>
                    <td>{!!link_to_route('users.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-link'])!!}</td>
                    </tbody>
                  @endforeach
                </table><!-- -->
                {{--{!!$roles->render()!!}--}}
              </div>
            </div>

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

