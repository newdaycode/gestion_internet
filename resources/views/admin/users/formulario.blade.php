<div class="col-md-12 form-horizontal">
    <div class="form-group row">
        <label class="label-text">Nombre *:</label>
        <div class=" col-md-12">
            <input type="text" class="form-control nombre" name="nombre" id="nombre" placeholder="Nombre" required="" readonly="" >
            <span class="text-danger error-text msj-error nombre_err"></span>
        </div>
    </div>
</div>

<div class="col-md-12 form-horizontal">
    <div class="form-group">
        <label class="label-text">Listado de Roles:</label>
        @foreach ($roles as $rol)
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="{{ $rol->name }}" name="roles[]" value="{{ $rol->id }}"> {{ $rol->name }}
                </label>
            </div>
        @endforeach
        <span class="text-danger error-text msj-error roles_err"></span>
    </div>
</div>
