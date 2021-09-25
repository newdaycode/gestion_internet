<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Nombre') }}</th>
            <th>{{ __('Teléfono') }}</th>
            <th>{{ __('Ubicación') }}</th>
            @can('admin.solicitudes.update','admin.solicitudes.destroy', 'admin.procesar')
                <th>{{ __('Acciones') }}</th>
            @endcan
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
                    @can('admin.solicitudes.update','admin.solicitudes.destroy', 'admin.procesar')
                        <div class="btn-group flex-wrap">
                            <div class="btn-group">
                                <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    @can('admin.solicitudes.update')
                                        <a onclick="event.preventDefault();editar({{$solicitud->id}});" href="#" class="dropdown-item" title="Editar">Editar</a>
                                    @endcan
                                    @can('admin.procesar')
                                        <a onclick="event.preventDefault();procesar({{$solicitud->id}});" href="#" class="dropdown-item" title="Procesar">Procesar</a>
                                    @endcan
                                    @can('admin.solicitudes.destroy')
                                        <a onclick="event.preventDefault();eliminar({{$solicitud->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
                                    @endcan
                                </div>
                            </div>
                        </div> 
                    @endcan                   
                </td>
            </tr>	                         	
        @endforeach 
    </tbody>
</table>