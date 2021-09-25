<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Nombre') }}</th>
            <th>{{ __('Teléfono') }}</th>
            <th>{{ __('Ubicación') }}</th>
            <th>{{__('Servicio')}}</th>
            <th>{{__('Costo del Servicio')}}</th>
            @can('admin.clientes.update','admin.clientes.destroy')
            <th>{{ __('Acciones') }}</th> 
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{ucfirst($cliente->nombre_cliente)}}</td> 
                <td>{{$cliente->movil}}</td>
                <td>{{ucfirst($cliente->ubicacion)}}</td> 
                <td>{{ucfirst($cliente->servicio->plan)}}</td> 
                <td>{{$cliente->servicio->monto}}$</td> 
                @can('admin.clientes.update','admin.clientes.destroy')
                    <td>
                        <div class="btn-group flex-wrap">
                            <div class="btn-group">
                                <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    @can('admin.clientes.update')
                                        <a onclick="event.preventDefault();editar({{$cliente->id}});" href="#" class="dropdown-item" title="Editar">Editar</a>
                                    @endcan
                                    @can('admin.clientes.destroy')
                                        <a onclick="event.preventDefault();eliminar({{$cliente->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
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