@section('title') Edit {!! $role->name !!} @stop
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
                <i class="fa fa-dashboard"></i> Roles
              </li>
            </ol>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- -->
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

            <div class="list-group" >
              <div class="list-group-item">
                <h4>
                  Mostrando rol
                  <a href="{{url('/roles/'.$role->id.'/edit')}}" style="float:right;" class="btn btn-primary">Editar</a>

                  <a href="{{url('/roles')}}" style="float:right;" class="btn btn-success">Volver al listado</a>

                </h4>
              </div><!-- /div .list-group-item -->
              <div class="list-group-item">
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::label('Nombre:')!!}
                  {!!Form::text('name',$parameters = $role->name,['class'=>'form-control', 'disabled'])!!}
                </div><!-- -->
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::label('Descripción:')!!}
                  {!!Form::textarea('description',$parameters = $role->description,['class'=>'form-control', 'disabled','rows' => '5'])!!}
                </div><!-- -->
              </div><!-- -->
            </div><!-- -->


          </div><!-- -->
        </div><!-- -->
      </div><!-- -->
    </div>
  </div><!-- -->
@stop