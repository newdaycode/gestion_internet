<option value='' disabled selected>---Seleccione---</option>
@foreach ($conexiones as $conexion)
    <option value="{{ $conexion->id }}" id="torr-{{ $conexion->id }}">{{ $conexion->lugar }} {{ $conexion->frecuencia}} Ghz({{$conexion->ssid}})</option>
@endforeach