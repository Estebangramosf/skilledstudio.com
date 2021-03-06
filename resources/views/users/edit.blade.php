@section('title') Edit {!! $user->name !!} @stop
@extends('layouts.app')
@section('content')
  <div class=" page-wrapper{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-header">
              Roles <small>Administrador de usuarios</small>
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
            {!!Form::model($user, ['method'=>'PUT', 'route' => ['users.update', $user->id] ])!!}
            @include('users.forms.fieldsCreateEdit')
          </div><!-- -->

        </div><!-- -->
      </div><!-- -->
    </div>
  </div><!-- -->
@stop