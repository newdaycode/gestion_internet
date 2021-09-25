<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Nombre') }}</th>
            <th>{{ __('Teléfono') }}</th>
            <th>{{ __('Ubicación') }}</th>
            <th>{{ __('Estado') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{$solicitud->id}}</td>
                <td>{{ucfirst($solicitud->nombre_solicitante)}}</td> 
                <td>{{$solicitud->movil}}</td>
                <td>{{ucfirst($solicitud->ubicacion)}}</td> 
                <td>
                    @if ($solicitud->estado === 'pendiente')
                        <span class="badge bg-warning">{{ucfirst($solicitud->estado)}}</span>
                    @elseif($solicitud->estado === 'factible')
                        <span class="badge bg-green">{{ucfirst($solicitud->estado)}}</span>
                    @else
                        <span class="badge bg-red">{{ucfirst('No Factible')}}</span>
                    @endif
                </td>
            </tr>	                         	
        @endforeach 
    </tbody>
</table>