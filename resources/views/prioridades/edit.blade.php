@extends('layouts.admin')
@section('contenido')
<div class="row">
  <div class="col-lg-6 col-xs-12">
    <h3>Editar Prioridades: {{$prioridades->Nombre}}</h3>

    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif

    {!!Form::model($prioridades,['method'=>'PATCH','route'=>['prioridades.update',$prioridades->id]])!!}
    {{Form::token()}}
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" value="{{$prioridades->nombre}}">
    </div>

    <div class="form-group">
      <button class="btn btn-primary" type="submit">Guardar</button>
      <button class="btn btn-danger" type="reset">Cancelar</button>
    </div>

    {!!Form::close()!!}
  </div>
</div>
@stop
