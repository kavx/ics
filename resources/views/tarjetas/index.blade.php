@extends('layouts.admin')
@section('contenido')
<div class="row">
<div class="col-xs-12">
  <div class="clearfix">
    <div class="tableTools-container">
      <div class="row">
      <div class="topnav">
  <a href="/tarjetas/create">Crear Nueva Tarjeta Amarilla <i class="fa fa-plus"></i></a>
  <a id="actual" href="/tarjetas">Todas las tarjetas</a>
  <a href="/mis-tarjetas">Mis tarjetas creadas</a>
  <a href="/tarjetas-asignadas">Mis tarjetas Asignadas</a>
</div>   
      </div>
    </div>
  </div>

  <div class="row">
                <div class="col-lg-2 col-md-3 col-lg-offset-1">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Total: 
                                         <h2>{{$totalTarjetas}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Emitidas: 
                                         <h2>{{$totalEmitidas}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Reasignadas: 
                                         <h2>{{$totalReasignadas}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Finalizadas: 
                                         <h2>{{$totalFinalizadas}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Pendientes: 
                                         <h2>{{$pendientes}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                
            </div>

  <div class="table-header">
    Listado de todas las tarjetas Amarillas
  </div>
<div class="table-responsive">

{!! Form::open(array('url'=>'tarjetas','method'=>'GET','autocomplete'=>'off','id'=>'formbusqueda','role'=>'search'))!!}
<div class="row">
<div class="col-lg-2 col-lg-offset-10">
  <div class="input-group">
    <input type="text" class="form-control" id="txtbuscar" name="buscar" value="{{$filtro}}" placeholder="Filtrar por Status...">
    <span class="input-group-btn">
      <button type="submit" id="btnbuscar" class="btn btn-primary">Filtrar </button>
    </span>
  </div>
  </div>
</div>
{{Form::close()}}

      <table class="table text-center table-striped" id="table-tarjetas">
        <thead>
          <th class="text-center">Numero</th>
          <th class="text-center">Area</th>
          <th class="text-center">Planta</th>
          <th class="text-center">Equipo</th>
          <th class="text-center">Categoria</th>
          <th class="text-center">Fecha</th>
          <th class="text-center">Prioridad</th>
          <th class="text-center">Descripcion</th>
          <th class="text-center">Creada por</th>
          <th class="text-center">Estado</th>
          <th class="text-center" WIDTH="122">Opciones</th>
        </thead>

        @foreach ($tarjetas as $t)
        <tr id="filas" class="item{{$t->id}}">
          <td>{{$t->id}}</td>
          <td>{{$t->area->nombre}}</td>
          <td>{{$t->planta->nombre}}</td>
          <td>{{$t->equipo->nombre}}</td>
          <td>{{$t->categoria->nombre}}</td>
          <td>{{$t->created_at->format('d-m-Y')}}</td>
          <td>{{$t->prioridad}}</td>
          <td>{{$t->descripcion_reporte}}</td>
          <td>{{$t->user->name}}</td>
          <td class="td-status"><span class="label label-sm label-warning">{{$t->status}}</span></td>
          <td>
            <div class="action-buttons">
              <a class="blue" href="{{URL::action('TarjetasController@show',$t->id)}}">
                <i class="ace-icon fa fa-eye bigger-200"></i>
              </a>
              <button class="btn btn-link btnEdit" data-id="{{$t->id}}" data-prioridad="{{$t->prioridad}}" data-desc="{{$t->descripcion_reporte}}">
                <i class="ace-icon fa fa-pencil bigger-200" style="color: green;"></i>
              </button>
              <button class="btn btn-link btn-borrar" data-id="{{$t->id}}">
                <i class="ace-icon fa fa-trash-o bigger-200" style="color: red;"></i>
              </button>
              @can('Borrar')
              @else
              @endcan
            </div>
          </td>
        </tr> 
        @endforeach
        @include('tarjetas.modal-editar')
        @include('tarjetas.modal')
      </table>
        </div>
</div>
</div>

@endsection


@section('scripts')

@include('delEditScripts')

<script type="text/javascript">

operacionesDE('tarjetas/');

</script>

@endsection
