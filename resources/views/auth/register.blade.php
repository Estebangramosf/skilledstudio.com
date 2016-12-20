@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Registro <small>Crear una nueva cuenta</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Registro
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
                <div style="background-color: #1c1c1c;" class="panel-heading"><span style="color:#fff;">Register</span></div>
                <div style="background-color: #3d3d3d;" class="panel-body">
                    <form style="color:#d5822d;" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label"></label>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div align="left">Name</div>
                                <input style="background-color: #1c1c1c;color:#d5822d;" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label"></label>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div align="left">E-Mail Address</div>
                                <input style="background-color: #1c1c1c;color:#d5822d;" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label"></label>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div align="left">Password</div>
                                <input style="background-color: #1c1c1c;color:#d5822d;" id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label"></label>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div align="left">Confirm Password</div>
                                <input style="background-color: #1c1c1c;color:#d5822d;" id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button style="background-color: #c43d23;color:#fff;border:1px solid #c43d23;" type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
