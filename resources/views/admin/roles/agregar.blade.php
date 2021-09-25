<!-- Inicio Modal -->
<div id="ModalRegistro" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Registro</h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="FormRegistro" autocomplete="off">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            @include('admin/roles/formulario')                      
                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>

                    <button type="submit" id="agregar" class="btn btn-rounded btn-primary">Registrar</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!-- Fin del Moda -->