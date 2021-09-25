<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Tipo') }}</th>
            <th>{{ __('Modelo') }}</th>
            <th>{{ __('Frecuencia') }}</th>
            <th>{{ __('Descripción') }}</th>
            <th>{{ __('Observación') }}</th>
            <th>{{ __('Puerto') }}</th>
            @can('admin.equipo_cliente.update','admin.equipo_cliente.destroy')
                <th>{{ __('Acciones') }}</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
            <tr>
                <td>{{$equipo->id}}</td>
                <td>{{ucfirst($equipo->tipo)}}</td> 
                <td>{{$equipo->modelo}}</td>
                <td>{{$equipo->frecuencia}}</td> 
                <td>{{$equipo->descripcion}}</td> 
                <td>{{$equipo->observacion}}</td> 
                <td>{{$equipo->puerto}}</td> 
                @can('admin.equipo_cliente.update','admin.equipo_cliente.destroy')
                    <td>
                        <div class="btn-group flex-wrap">
                            <div class="btn-group">
                                <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    @can('admin.equipo_cliente.update')
                                        <a onclick="event.preventDefault();editar({{$equipo->id}});" href="#" class="dropdown-item" title="Editar">Editar</a>
                                    @endcan
                                    @can('admin.equipo_cliente.destroy')
                                        <a onclick="event.preventDefault();eliminar({{$equipo->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
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