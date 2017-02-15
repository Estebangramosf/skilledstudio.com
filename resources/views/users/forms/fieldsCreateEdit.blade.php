<div class="list-group" >
  <div class="list-group-item">
    <h4>
      @if(Request::path()=='users/create')
        <a href="{{url('/users/create')}}">Nuevo usuario</a>
      @else
        <a href="{{url('/users/'.(isset($user->id)?$user->id:1).'/edit')}}">Editar usuario</a>
      @endif

      <a href="{{url('/users')}}" style="float:right;" class="btn btn-success">Volver al listado</a>
    </h4>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">

    <div class="form-group has-feedback has-feedback-left">
      {!!Form::label('Nombre:')!!}
      {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del usuario'])!!}
    </div><!-- /div .list-group-item -->
    <div class="form-group has-feedback has-feedback-left">
      {!!Form::label('Email:')!!}
      {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese email del usuario'])!!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left -->
    <div class="form-group has-feedback has-feedback-left">
      {!!Form::label('Role:')!!}
      {!!Form::select('role', ['editor' => 'Editor', 'user' => 'Usuario'], null, ['placeholder' => 'Seleccione un rol', 'class' => 'form-control'])!!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left -->
    <div class="form-group has-feedback has-feedback-left">
      {!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success'])!!}
      {!!Form::close()!!}

      @if(strpos(Request::path(),'edit', 8))
        {!!Form::open(['action'=> ['UserController@destroy', $user->id], 'method'=>'DELETE'])!!}
        {!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger', 'id'=>'eliminar'])!!}﻿
        {!!Form::close()!!}
      @endif
    </div><!-- -->
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->
