<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Tipo *:</label>
        <div class=" col-md-12">
            <select class="form-control" title="Tipo" name="tipo" required="">
                <option value='' disabled selected>---Seleccione---</option>
                <option value='antena'>Antena</option>
                <option value='computador'>Computador</option>
                <option value='router'>Router</option>
            </select>
            <span class="text-danger error-text msj-error tipo_err"></span>
        </div>
    </div>
</div>  
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Modelo *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="modelo" required="" placeholder="Modelo del Equipo" >
            <span class="text-danger error-text msj-error modelo_err"></span>
        </div>
    </div>
</div>   
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Frecuencia *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="frecuencia" required="" placeholder="Frecuencia del Equipo" >
            <span class="text-danger error-text msj-error frecuencia_err"></span>
        </div>
    </div>
</div>    
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Puerto *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="puerto" placeholder="Puerto del Equipo" required="">
            <span class="text-danger error-text msj-error puerto_err"></span>
        </div>
    </div>
</div> 
<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Descripción *:</label>
        <div class=" col-md-12">
            <textarea class="form-control" cols="5" name="descripcion" placeholder="Descripción del Equipo"></textarea>
            <span class="text-danger error-text msj-error descripcion_err"></span>
        </div>
    </div>
</div> 
<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Observaciones *:</label>
        <div class=" col-md-12">
            <textarea class="form-control" cols="5" name="observacion" placeholder="Observaciones"></textarea>
            <span class="text-danger error-text msj-error observacion_err"></span>
        </div>
    </div>
</div> 