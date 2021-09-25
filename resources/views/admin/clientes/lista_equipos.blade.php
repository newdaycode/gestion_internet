<option value='' disabled selected>---Seleccione---</option>
@foreach ($equipos as $equipo)
    <option value="{{ $equipo->id }}" id="equi-{{ $equipo->id }}">{{ $equipo->tipo }} ({{$equipo->modelo}})</option>
@endforeach