<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Nombre del Solicitante *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control nombre_solicitante" name="nombre_solicitante" id="nombre_solicitante" placeholder="Nombre" required="" >
            <span class="text-danger error-text msj-error nombre_solicitante_err"></span>
        </div>
    </div>
</div>
<input type="hidden" class="form-control slug" name="slug" id="slug" placeholder="slug" required="" readonly="">
<span class="text-danger error-text msj-error slug_err"></span>
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Cedula ó Rif:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="cd_rif" id="cd_rif" placeholder="Cedula ó Rif:" >
            <span class="text-danger error-text msj-error cd_rif_err"></span>
        </div>
    </div>
</div> 
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Teléfono Movil *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="movil" id="movil" placeholder=" Teléfono Movil" required="">
            <span class="text-danger error-text msj-error movil_err"></span>
        </div>
    </div>
</div>  
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Teléfono Fijo:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="fijo" id="fijo" placeholder=" Teléfono Fijo" >
            <span class="text-danger error-text msj-error fijo_err"></span>
        </div>
    </div>
</div> 
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Correo:</label>
        <div class=" col-md-12">
            <input type="email" class="form-control" name="email" id="email" placeholder="Correo">
            <span class="text-danger error-text msj-error email_err"></span>
        </div>
    </div>
</div> 
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Ubicación *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ubicación" required="">
            <span class="text-danger error-text msj-error ubicacion_err"></span>
        </div>
    </div>
</div> 
<div class="col-md-6 form-horizontal">
    <div class="form-group">
        <label class="label-text">Posee Antena *:</label>
        <div class="radio">
            <label>
                <input type="radio" name="antena" id="antena1" value="si" checked>
                Si
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="antena" id="antena2" value="no">
                No
            </label>
        </div>
        <span class="text-danger error-text msj-error antena_err"></span>
    </div>
</div> 
<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Observaciones *:</label>
        <div class=" col-md-12">
            <textarea class="form-control" cols="5" name="observaciones" id="observaciones"></textarea>
            <span class="text-danger error-text msj-error observaciones_err"></span>
        </div>
    </div>
</div> 