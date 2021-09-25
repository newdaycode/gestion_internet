<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('SSID') }}</th>
		  	<th>{{ __('Acceso') }}</th>
            <th>{{ __('Capacidad') }}</th>
            <th>{{ __('Frecuencia') }}</th>
            <th>{{ __('Lugar') }}</th>
            <th>{{ __('Observacion') }}</th>
            <th>{{ __('IP') }}</th>
            <th>{{ __('MAC') }}</th>
            @can('admin.torres.update','admin.torres.destroy')
                <th>{{ __('Acciones') }}</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($torres as $torre)
            <tr>
                <td>{{$torre->ssid}}</td>
                <td>{{$torre->acceso}}</td> 
                <td>{{$torre->capacidad}}</td>
                <td>{{$torre->frecuencia}}</td> 
                <td>{{$torre->lugar}}</td> 
                <td>{{$torre->observacion}}</td> 
                <td>{{$torre->ip}}</td> 
                <td>{{$torre->mac_address}}</td> 
                @can('admin.torres.update','admin.torres.destroy')
                    <td>
                        <div class="btn-group flex-wrap">
                            <div class="btn-group">
                                <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    @can('admin.torres.update')
                                        <a onclick="event.preventDefault();editar({{$torre->id}});" href="#" class="dropdown-item" title="Editar">Editar</a>
                                    @endcan
                                    @can('admin.torres.destroy')
                                        <a onclick="event.preventDefault();eliminar({{$torre->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
                                    @endcan
                                </div>
                            </div>
                        </div>                    
                    </td>
                @endcan
            </tr>	                         	
        @endforeach 
    </tbody>
</table>