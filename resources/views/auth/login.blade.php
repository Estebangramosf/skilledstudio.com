@extends('layouts.app')

@section('content')

<div class="container-fluid">


    <!-- Page Heading -->
{{--
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
--}}
    <!-- /.row -->

    <div class="row">
        <div align="center" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        </div>
        <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default" style="border: 1px solid #fc6000;">
                <div style="background-color: #010a13;border: 1px solid #fc6000;" class="panel-heading"><span style="color:#fcc367;"><h3 style="padding: 0px;margin: 0px;">INICIAR SESIÓN</h3></span></div>
                <div style="background-color: #010a13;border: 1px solid #fc6000;padding-bottom: 0px;" class="panel-body">
                    <form style="color:#fcc367;" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-2"></div>
                            <label for="email" class="control-label"></label>
                            <div class="col-md-8">
                                <div align="left">Dirección De Correo</div>
                                <input style="background-color: #24282c;color:#fcc367;border: solid 1px #fc6000;border-radius: 1px;" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-2"></div>
                            <label for="password" class="control-label"></label>
                            <div class="col-md-8">
                                <div align="left">Password</div>
                                <input style="background-color: #24282c;color:#fcc367;border: solid 1px #fc6000;border-radius: 1px;" id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button style="background-color: #c43d23;color:#fff;border:1px solid #fcc367;font-size: 1.25em;" type="submit" class="btn btn-primary form-control">
                                    Iniciar Sesión
                                </button>

                                <a class="btn btn-link" style="color:#fcc367;padding-bottom: 0px;" href="{{ url('/password/reset') }}">Olvidaste tu contraseña?</a>
                                <a class="btn btn-link" style="color:#fcc367;padding-bottom: 0px;" href="{{ url('/register') }}">Aún no tienes una cuenta?</a>
                            </div>
                            <div class="col-md-2"></div>

                        </div>
                    </form>
                </div>
            </div>
            ©{{date('Y')}} Skilled Studio. <br> Todos los derechos reservados. <br> Skilled Studio y todos los videojuegos son marcas comerciales, marcas de servicio o marcas registradas por Skilled Studio.
        </div>
    </div>
</div>

@endsection
