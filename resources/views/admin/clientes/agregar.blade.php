<!-- Inicio Modal -->
<div id="ModalRegistro" class="modal fade" data-backdrop="static"  style="overflow:auto !important">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Registro</h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="FormRegistro" class='formul-div' autocomplete="off" >
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="text-center col-auto"><h5 class="bg-primary" style="border-radius: 10px; padding: 5px;" >Datos del Cliente</h5></div> 
                        <div class="row">  
                            <div class="col-md-12 form-horizontal">
                                <label class="label-text">Cedula ó Rif:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cd_rif" id="cd_rif" placeholder="Cedula ó Rif:" >
                                    <span class="text-danger error-text msj-error cd_rif_err"></span>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary buscar_cliente" type="button" aria-label="">Buscar</button>
                                    </span>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Nombre del Solicitante *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control nombre_solicitante" name="nombre_solicitante" id="nombre_solicitante" placeholder="Nombre" required="" >
                                        <span class="text-danger error-text msj-error nombre_solicitante_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Nombre de Usuario *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control usuario" name="usuario" placeholder="Nombre" required="" >
                                        <span class="text-danger error-text msj-error usuario_err"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control slug" name="slug" id="slug" placeholder="slug" required="" readonly="">
                            <span class="text-danger error-text msj-error slug_err"></span>
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Teléfono Movil *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="movil" id="movil" placeholder=" Teléfono Movil" required="">
                                        <span class="text-danger error-text msj-error movil_err"></span>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Teléfono Fijo:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="fijo" id="fijo" placeholder=" Teléfono Fijo" >
                                        <span class="text-danger error-text msj-error fijo_err"></span>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Correo:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo">
                                        <span class="text-danger error-text msj-error email_err"></span>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Ubicación *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ubicación" required="">
                                        <span class="text-danger error-text msj-error ubicacion_err"></span>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-12 form-horizontal">
                                <label class="label-text">Observaciones *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <textarea class="form-control" cols="5" name="observaciones" id="observaciones"></textarea>
                                        <span class="text-danger error-text msj-error observaciones_err"></span>
                                    </div>
                                </div>
                            </div>                 
                        </div>    
                        <div class="text-center col-auto"><h5 class="bg-primary" style="border-radius: 10px; padding: 5px;" >Datos del Sistema</h5></div>     
                        <div class="row">
                            <div class="col-md-12 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Nombre del Servicio *:</label>
                                    <div class=" col-md-12">
                                        <div class="input-group input-group-sm">
                                            <select class="form-control listado_servicios" title="Servicio" name="servicios_id" required="">
                                                @include('admin.clientes.lista_servicios')
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary btn-sm agregar_servicio"><i class="fas fa-fw fa-plus"></i></button>
                                            </span>
                                        </div>
                                        <span class="text-danger error-text msj-error servicios_id_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Dirección IP *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control ip" name="ip" id="ip" placeholder="Dirección IP" required="" >
                                        <span class="text-danger error-text msj-error ip_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Fecha de Instalación *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control fecha_i" name="fecha_i" placeholder="Seleccione" id="startDate" required="" >
                                        <span class="text-danger error-text msj-error fecha_i_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Costo de Instalación *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control costo" name="costo" id="costo" placeholder="Costo de Instalación" required="" >
                                        <span class="text-danger error-text msj-error costo_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Conectado a *:</label>
                                    <div class=" col-md-12">
                                        <div class="input-group input-group-sm">
                                            <select class="form-control listado_conexion" title="Conexion" name="torres_id" required="">
                                                @include('admin.clientes.lista_conexiones')
                                            </select>
                                        </div>
                                        <span class="text-danger error-text msj-error torres_id_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Equipo para conexión *:</label>
                                    <div class=" col-md-12">
                                        <div class="input-group input-group-sm">
                                            <select class="form-control listado_equipos" title="Equipos" name="equipos_id" required="">
                                                @include('admin.clientes.lista_equipos')
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary btn-sm agregar_equipo"><i class="fas fa-fw fa-plus"></i></button>
                                            </span>
                                        </div>
                                        <span class="text-danger error-text msj-error equipos_id_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Costo *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control costo_equipo" name="costo_equipo"  placeholder="Costo" required="" >
                                        <span class="text-danger error-text msj-error costo_equipo_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <div class="form-group row">
                                    <label class="label-text">Otros Equipos *:</label>
                                    <div class=" col-md-12">
                                        <div class="input-group input-group-sm">
                                            <select class="form-control" title="Equipos" name="otros_equi" required="">
                                                <option value='Ninguno'>Ninguno</option>
                                                <option value='Switch' id="Switch">Switch</option>
                                                <option value='Router' id="Router">Router</option>	
                                            </select>
                                        </div>
                                        <span class="text-danger error-text msj-error otros_equi_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-horizontal">
                                <label class="label-text">Costo *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="costo_otro_equipo"  placeholder="Costo" required="" >
                                        <span class="text-danger error-text msj-error costo_otro_equipo_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-horizontal">
                                <label class="label-text">Mac address *:</label>
                                <div class="form-group row">
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" name="mac_address"  placeholder="##:##:##:##:##:##" required="" style="text-transform:uppercase;">
                                        <span class="text-danger error-text msj-error mac_address_err"></span>
                                    </div>
                                </div>
                            </div>
                        </div>           
                    </div>
                </div>
                
                <div class="modal-footer">
                    <input type="hidden" readonly="readonly" name="codigo_editar">
                    <input type="hidden" readonly="readonly" id="accion" name='accion' value='agregar'>
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="editar" class="btn btn-rounded btn-primary">Procesar</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!-- Fin del Moda -->