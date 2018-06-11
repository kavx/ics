<div class="modal fade" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$cat->id}}">
  {{Form::open(array('action'=>array('CategoriasController@destroy',$cat->id),'method'=>'delete'))}}
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <span class="white">&times;</span>
          </button>
           Eliminar Categoria
        </div>
      </div>
        <div class="modal-body">
          <p>Desea eliminar la categoria: <b>{{$cat->nombre}}</b>?</p>
        </div>

         <div class="modal-footer no-margin-top">
        <button type="submit" class="btn btn-sm btn-success pull-left">
          <i class="ace-icon fa fa-check"></i>
          Eliminar
        </button>
        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
          <i class="ace-icon fa fa-times"></i>
          Cerrar
        </button>
      </div>
      </div>
    </div>
  {{Form::Close()}}
</div>