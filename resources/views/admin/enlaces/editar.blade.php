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
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">SSID *:</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="ssid" placeholder="SSID" required="" >
                                        <span class="text-danger error-text msj-error ssid_err"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Equipo *:</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="equipo" placeholder="Equipo" required="" >
                                        <span class="text-danger error-text msj-error equipo_err"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Frecuencia *:</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="frecuencia" placeholder="frecuencia" required="" >
                                        <span class="text-danger error-text msj-error frecuencia_err"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Dirección IP *:</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="ip" placeholder="Dirección IP" required="" >
                                        <span class="text-danger error-text msj-error ip_err"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Dirección Mac *:</label>
                                    <div class=" col-md-12">
                                        <input type="text" style="text-transform:uppercase;" class="form-control" name="mac_address" placeholder="##-##-##-##-##-##" required="" >
                                        <span class="text-danger error-text msj-error mac_address_err"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Modo *:</label>
                                    <div class=" col-md-12">
                                        <select class="form-control" title="Modo" name="modo" required="">
                                            <option value='AP' id="AP">AP</option>";
                                            <option value='Cliente' id="Cliente">Cliente</option>";
                                        </select>
                                        <span class="text-danger error-text msj-error modo_err"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Lugar *:</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="lugar" required="" placeholder="Lugar" >
                                        <span class="text-danger error-text msj-error lugar_err"></span>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Observación *:</label>
                                    <div class=" col-md-12">
                                        <textarea class="form-control" cols="5" name="observacion"></textarea>
                                        <span class="text-danger error-text msj-error observacion_err"></span>
                                    </div>
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