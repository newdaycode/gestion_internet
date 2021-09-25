<!-- Modal de eliminar -->
<div class="modal fade modal-fall" id="ModalEliminar" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormEliminar">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body" align="center">
                    <h4 id="eliminar-titulo"></h4>
                    <h4 class="text-warning"><small>!Esta acción es irreversible!.</small></h4>
                    <i class="icon wb-trash eliminar" aria-hidden="true"></i>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="codigo" name="codigo" value="0">
                    <input type="button" class="btn btn-rounded btn-default" data-dismiss="modal" value="Cancelar">
                    <button type="button" class="btn btn-rounded btn-danger" id="btn-eliminar">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>