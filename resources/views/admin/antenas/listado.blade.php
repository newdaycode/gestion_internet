<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Modelo') }}</th>
            <th>{{ __('Tipo') }}</th>
            <th>{{ __('Polarización') }}</th>
            <th>{{ __('Ganancia') }}</th>
            @can('admin.antenas.update','admin.antenas.destroy')
                <th>{{ __('Acciones') }}</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($antenas as $antena)
            <tr>
                <td>{{$antena->id}}</td>
                <td>{{ucfirst($antena->modelo)}}</td> 
                <td>{{$antena->tipo}}</td>
                <td>{{$antena->polarizacion}}</td> 
                <td>{{$antena->ganancia}}</td> 
                @can('admin.antenas.update','admin.antenas.destroy')
                    <td>
                        <div class="btn-group flex-wrap">
                            <div class="btn-group">
                                <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    @can('admin.antenas.update')
                                        <a onclick="event.preventDefault();editar({{$antena->id}});" href="#" class="dropdown-item" title="Editar">Editar</a>
                                    @endcan
                                    @can('admin.antenas.destroy')
                                        <a onclick="event.preventDefault();eliminar({{$antena->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
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