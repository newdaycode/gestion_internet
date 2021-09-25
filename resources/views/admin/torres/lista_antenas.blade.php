<option value='' disabled selected>---Seleccione---</option>
@foreach ($antenas as $antena)
    <option value="{{ $antena->id }}">{{ $antena->modelo }}</option>
@endforeach