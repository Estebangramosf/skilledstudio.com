@extends('layouts.app')

@section('content')

<div class="container-fluid">


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Iniciar Sesión <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Inicio de sesión
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div align="center" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        </div>
        <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div style="background-color: #1c1c1c;" class="panel-heading"><span style="color:#fff;">Login</span></div>
                <div style="background-color: #3d3d3d;" class="panel-body">
                    <form style="color:#d5822d;" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input style="background-color: #1c1c1c;color:#d5822d;" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input style="background-color: #1c1c1c;color:#d5822d;" id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button style="background-color: #c43d23;color:#fff;border:1px solid #c43d23;" type="submit" class="btn btn-primary form-control">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" style="color:#fff;" href="{{ url('/password/reset') }}">Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
