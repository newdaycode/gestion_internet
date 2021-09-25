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
        <label class="label-text">Punto de Acceso *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="acceso" placeholder="Access Point" required="">
            <span class="text-danger error-text msj-error acceso_err"></span>
        </div>
    </div>
</div>
<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Tipo Antena *:</label>
        <div class=" col-md-12">
            <div class="input-group input-group-sm">
                <select class="form-control listado_antenas" title="Antena" name="antenas_id" required="">
                    @include('admin.torres.lista_antenas')
                </select>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-primary btn-sm agregar_antena"><i class="fas fa-fw fa-plus"></i></button>
                </span>
            </div>
            <span class="text-danger error-text msj-error antenas_id_err"></span>
        </div>
    </div>
</div>  
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Capacidad *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="capacidad" placeholder="Capacidad" required="" >
            <span class="text-danger error-text msj-error capacidad_err"></span>
        </div>
    </div>
</div>   
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Frecuencia *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="frecuencia" placeholder="Frecuencia" required="" >
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
        <label class="label-text">Mac address *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="mac_address" placeholder="##-##-##-##-##-##" required="" >
            <span class="text-danger error-text msj-error mac_address_err"></span>
        </div>
    </div>
</div> 

<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Lugar *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="lugar" placeholder="Lugar" required="" >
            <span class="text-danger error-text msj-error lugar_err"></span>
        </div>
    </div>
</div> 

<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Observaciones *:</label>
        <div class=" col-md-12">
            <textarea class="form-control" cols="5" name="observacion" placeholder="Observaciones de la Torre"></textarea>
            <span class="text-danger error-text msj-error observacion_err"></span>
        </div>
    </div>
</div> 