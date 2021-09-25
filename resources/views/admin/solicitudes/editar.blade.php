<!-- Inicio Modal -->
<div id="ModalEditar" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="FormEditar" autocomplete="off">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            @include('admin/solicitudes/formulario')                          
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