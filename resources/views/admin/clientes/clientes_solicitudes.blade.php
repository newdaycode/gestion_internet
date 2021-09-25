<!-- Inicio Modal -->
<div id="ModalSolicitudes" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Listado de Solictudes Factibles</h5>

                <button type="button" class="close cerrar_soli" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="tabla-listado-solicitudes table-responsive">
                    @include('admin.clientes.listado_solcitudes')
                </div>	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-default cerrar_soli" data-dismiss="modal">Cerrar</button>
            </div> 
        </div>
        </div>
    </div>
</div>
<!-- Fin del Moda -->