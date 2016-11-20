<div class="list-group" >
  <div class="list-group-item">
    <h4>
      Nuevo Rol
      <a href="{{url('/roles')}}" style="float:right;" class="btn btn-success">Volver al listado</a>
    </h4>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    <div class="form-group has-feedback has-feedback-left">
      {!!Form::label('Nombre:')!!}
      {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del rol'])!!}
    </div><!-- /div .list-group-item -->
    <div class="form-group has-feedback has-feedback-left">
      {!!Form::label('Descripción:')!!}
      {!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Ingrese descripción del rol','rows' => '5'])!!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left -->
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->
