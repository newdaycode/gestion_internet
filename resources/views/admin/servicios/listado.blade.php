<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Tipo de Plan') }}</th>
            <th>{{ __('Megas') }}</th>
            <th>{{ __('Descripción') }}</th>
            <th>{{ __('Monto') }}</th>
            @can('admin.servicios.update','admin.servicios.destroy')
                <th>{{ __('Acciones') }}</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($servicios as $servicio)
            <tr>
                <td>{{$servicio->id}}</td>
                <td>{{ucfirst($servicio->plan)}}</td> 
                <td>{{$servicio->megas}} Mb</td>
                <td>{{$servicio->descripcion}}</td> 
                <td>{{$servicio->monto}}$</td> 
                @can('admin.servicios.update','admin.servicios.destroy')
                    <td>
                        <div class="btn-group flex-wrap">
                            <div class="btn-group">
                                <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    @can('admin.servicios.update')
                                        <a onclick="event.preventDefault();editar({{$servicio->id}});" href="#" class="dropdown-item" title="Editar">Editar</a>
                                    @endcan
                                    @can('admin.servicios.destroy')
                                        <a onclick="event.preventDefault();eliminar({{$servicio->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
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