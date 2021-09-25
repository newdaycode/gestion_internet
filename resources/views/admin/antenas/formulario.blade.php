<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Modelo *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="modelo" placeholder="Modelo de la antena" required="" >
            <span class="text-danger error-text msj-error modelo_err"></span>
        </div>
    </div>
</div>
<div class="col-md-6 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Tipo *:</label>
        <div class=" col-md-12">
            <select class="form-control" title="Tipo" name="tipo" required="">
                <option value='' disabled selected>---Seleccione---</option>
                <option value='Sectorial 60°'>Sectorial 60°</option>
                <option value='Sectorial 90°'>Sectorial 90°</option>
                <option value='Sectorial 120°'>Sectorial 120°</option>
                <option value='Omnidireccional'>Omnidireccional</option>
                <option value='Unidireccional'>Unidireccional</option>
                <option value='Interna/integrada'>Interna/integrada</option>
            </select>
            <span class="text-danger error-text msj-error tipo_err"></span>
        </div>
    </div>
</div>
<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Polarización *:</label>
        <div class=" col-md-12">
            <select class="form-control" title="Polarización" name="polarizacion" required="">
                <option value='' disabled selected>---Seleccione---</option>
                <option value='Vertical'>Vertical</option>
                <option value='Horizontal'>Horizontal</option>
                <option value='Doble'>Doble</option>
            </select>
            <span class="text-danger error-text msj-error polarizacion_err"></span>
        </div>
    </div>
</div>  
<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Ganancia *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control" name="ganancia" required="" placeholder="Ganancia Dbi" >
            <span class="text-danger error-text msj-error ganancia_err"></span>
        </div>
    </div>
</div> 
