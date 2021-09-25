<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Nombre') }}</th>
            <th>{{ __('Teléfono') }}</th>
            <th>{{ __('Ubicación') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{$solicitud->id}}</td>
                <td>{{ucfirst($solicitud->nombre_solicitante)}}</td> 
                <td>{{$solicitud->movil}}</td>
                <td>{{ucfirst($solicitud->ubicacion)}}</td>
            </tr>	                         	
        @endforeach 
    </tbody>
</table>