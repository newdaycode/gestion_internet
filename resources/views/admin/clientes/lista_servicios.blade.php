<option value='' disabled selected>---Seleccione---</option>
@foreach ($servicios as $servicio)
    <option value="{{ $servicio->id }}" id="ser-{{ $servicio->id }}">{{ $servicio->plan }}</option>
@endforeach