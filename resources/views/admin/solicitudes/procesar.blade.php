<!-- Inicio Modal -->
<div id="ModalProcesar" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Procesar Solicitud</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="FormProcesar" autocomplete="off">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Estado *:</label>
                                    <div class=" col-md-12">
                                        <select class="form-control" title="Estado" name="estado" id="estado" required="">
                                            <option value='' disabled selected>---Seleccione---</option>
                                            <option value="1">Factible</option>
                                            <option value="2">No Factible</option>
                                        </select>
                                        <span class="text-danger error-text msj-error estado_err"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Descripción *:</label>
                                    <div class=" col-md-12">
                                        <textarea class="form-control" cols="5" name="descripcion" id="descripcion" required=""></textarea>
                                        <span class="text-danger error-text msj-error descripcion_err"></span>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="procesar_data" id="procesar_data" value="">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar" class="btn btn-rounded btn-primary">Guardar</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!-- Fin del Moda -->