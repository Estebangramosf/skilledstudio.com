@section('title') New role @endsection
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
            {!!Form::open(['route'=>'roles.store', 'method'=>'POST'])!!}
            @include('roles.forms.fieldsCreateEdit')
          </div><!-- -->
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="list-group">
              <div class="list-group-item">
                <h4>Todos los campos son requeridos</h4>
              </div><!-- -->
              <div class="list-group-item">
                <div class="form-group has-feedback has-feedback-left">
                  {!!Form::label('Registrar')!!}
                  {!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;'])!!}
                  {!!Form::close()!!}
                </div><!-- -->
              </div><!-- -->
            </div><!-- -->
          </div><!-- -->

        </div><!-- -->
      </div><!-- -->
    </div>

  </div><!-- -->

@endsection