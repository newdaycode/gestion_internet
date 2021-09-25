<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('SSID') }}</th>
		  	<th>{{ __('Equipo') }}</th>
            <th>{{ __('Frecuencia') }}</th>
            <th>{{ __('IP') }}</th>
            <th>{{ __('MAC') }}</th>
            <th>{{ __('Modo') }}</th>
            @can('admin.enlaces.update','admin.enlaces.destroy')
            <th>{{ __('Acciones') }}</th> 
            @endcan
        </tr>
    </thead>
    <tbody>
    @foreach($enlaces as $enlace)
            <tr>
                <td>{{$enlace->ssid}}</td>
                <td>{{ucfirst($enlace->equipo)}}</td> 
                <td>{{$enlace->frecuencia}}</td>
                <td>{{$enlace->ip}}</td> 
                <td>{{$enlace->mac_address}}</td> 
                <td>{{$enlace->modo}}</td> 
                 @can('admin.enlaces.update','admin.enlaces.destroy')
                    <td>
                        <div class="btn-group flex-wrap">
                            <div class="btn-group">
                                <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;"> 
                                    @can('admin.enlaces.update')
                                        <a onclick="event.preventDefault();editar({{$enlace->id}});" href="#" class="dropdown-item" title="Editar">Editar</a> 
                                    @endcan
                                    @can('admin.enlaces.destroy')
                                        <a onclick="event.preventDefault();eliminar({{$enlace->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a> 
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