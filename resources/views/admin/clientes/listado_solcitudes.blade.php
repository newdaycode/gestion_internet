<table class="table dataTable" data-plugin="dataTable" id="datatable_soli">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Nombre') }}</th>
            <th>{{ __('Teléfono') }}</th>
            <th>{{ __('Ubicación') }}</th>
            <th>{{ __('Agregar') }}</th>
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
                <span class="input-group-btn">
                    <a onclick="event.preventDefault();cargar(codigo= {{ $solicitud->id }},nombre = '{{$solicitud->nombre_solicitante}}', cedula = '{{$solicitud->cd_rif}}', movil = '{{$solicitud->movil}}', fijo = '{{$solicitud->fijo}}', email = '{{$solicitud->email}}', ubicacion = '{{$solicitud->ubicacion}}',  observaciones = '{{$solicitud->observaciones}}' );" href="#" class="btn btn-primary btn-sm "><i class="fas fa-fw fa-plus"></i></a>
                </span>                  
                </td>
            </tr>	                         	
        @endforeach 
    </tbody>
</table>