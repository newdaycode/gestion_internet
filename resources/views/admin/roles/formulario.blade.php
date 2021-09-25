<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Nombre del Rol *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control name" name="name" id="name" placeholder="Nombre" required="" >
            <span class="text-danger error-text msj-error name_err"></span>
        </div>
    </div>
</div>
<div class="col-md-12 form-horizontal">
    <div class="form-group">
        <label class="label-text">Listado de Roles *:</label>
        @foreach ($permisos as $permiso)
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="permisos[]"  value="{{ $permiso->id }}"> {{ $permiso->description }}
                </label>
            </div>
        @endforeach
        <span class="text-danger error-text msj-error permisos_err"></span>
    </div>
</div>