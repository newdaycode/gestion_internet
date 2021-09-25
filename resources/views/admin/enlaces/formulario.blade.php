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
                <option value='' disabled selected>---Seleccione---</option>
                <option value='AP'>AP</option>";
		        <option value='Cliente'>Cliente</option>";
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