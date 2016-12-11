@section('title') Nueva Galería @endsection
@extends('layouts.app')
@section('content')
  <div class=" page-wrapper{{-- jumbotron --}}">
    <div class="container-fluid">
      <div class="">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-9">
            <h1 class="page-header">
              Galerías <small>Crear nueva galería</small>
            </h1>
            <ol class="breadcrumb">
              <li class="active">
                <i class="fa fa-dashboard"></i> Galerías
              </li>
            </ol>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- -->
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
            @include('gallery.forms.fieldsCreateEdit')
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