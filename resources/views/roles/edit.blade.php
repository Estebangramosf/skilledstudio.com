@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit {!! $role->name !!} @stop
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
            {!!Form::model($role, ['method'=>'PUT', 'route' => ['roles.update', $role->id] ])!!}
            @include('roles.forms.fieldsCreateEdit')
          </div><!-- -->
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="list-group">
              <div class="list-group-item">
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;', 'id'=>'guardar'])!!}
                  <br>
                  {!!Form::close()!!}
                </div><!-- -->
              </div><!-- -->
              <div class="list-group-item">
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::open(['action'=> ['RoleController@destroy', $role->id], 'method'=>'DELETE'])!!}
                  {!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'style'=>'width:100%;', 'id'=>'eliminar'])!!}﻿
                  {!!Form::close()!!}
                </div><!-- -->
              </div><!-- -->
            </div><!-- -->
          </div><!-- -->
        </div><!-- -->
      </div><!-- -->
    </div>
  </div><!-- -->
@stop