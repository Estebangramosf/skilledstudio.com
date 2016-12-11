@section('title') Roles @endsection
@extends('layouts.app')
@section('content')
  <div class=" page-wrapper{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-9">
            <h1 class="page-header">
              Roles <small>Administrador de roles</small>
            </h1>
            <ol class="breadcrumb">
              <li class="active">
                <i class="fa fa-dashboard"></i> Roles ·
                <a class="btn-link" href="{{url('/roles/create')}}">Nuevo rol</a>
              </li>
            </ol>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            @include('alerts.allAlerts')
          </div><!-- -->
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">

            <div class="list-group">
              <div class="list-group-item">
                <h4>
                  Listado de Roles
                  {{--<a href="{{url('/roles/create')}}" style="float:right;" class="btn btn-success">Crear nuevo rol</a>--}}
                </h4>

              </div>
              <div class="list-group-item">
                <table class="table">
                  <thead>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Operaciones</th>
                  </thead>
                  @foreach($roles as $role)
                    <tbody>
                    <td>{!!$role->name!!}</td>
                    <td>{!!$role->description!!}</td>
                    <td>{!!link_to_route('roles.edit', $title = 'Editar', $parameters = $role->id, $attributes = ['class'=>'btn btn-link'])!!}</td>
                    </tbody>
                  @endforeach
                </table><!-- -->
                {{--{!!$roles->render()!!}--}}
              </div>
            </div>

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
@endsection

