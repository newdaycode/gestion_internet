<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Nombre') }}</th>
            <th>{{ __('Teléfono') }}</th>
            <th>{{ __('Ubicación') }}</th>
            <th>{{ __('Descripción') }}</th>
            <th>{{ __('Procesar') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{$solicitud->id}}</td>
                <td>{{ucfirst($solicitud->nombre_solicitante)}}</td> 
                <td>{{$solicitud->movil}}</td>
                <td>{{ucfirst($solicitud->ubicacion)}}</td>
                <td>{{ucfirst($solicitud->observaciones)}}</td>
                <td><a onclick="event.preventDefault();procesar({{$solicitud->id}});" href="#" class="btn btn-rounded btn-primary btn-sm" title="Procesar">Procesar</a></td>
            </tr>                               
        @endforeach 
    </tbody>
</table>