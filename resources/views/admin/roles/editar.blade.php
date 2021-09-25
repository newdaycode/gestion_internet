<!-- Inicio Modal -->
<div id="ModalEditar" class="modal fade">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="FormEditar" autocomplete="off">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Nombre del Rol *:</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control name" name="name" id="name" placeholder="Nombre" required="" readonly="">
                                        <span class="text-danger error-text msj-error name_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-horizontal">
                                <div class="form-group">
                                    <label class="label-text">Listado de Roles *:</label>
                                    @foreach ($permisos as $permiso)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="{{ $permiso->name }}" name="permisos[]"  value="{{ $permiso->id }}"> {{ $permiso->description }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <span class="text-danger error-text msj-error permisos_err"></span>
                                </div>
                            </div>                         
                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="codigo_editar" id="codigo_editar">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="editar" class="btn btn-rounded btn-primary">Actualizar</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!-- Fin del Moda -->