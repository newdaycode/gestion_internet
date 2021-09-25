<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Rol') }}</th>
            @can('admin.roles.update','admin.roles.destroy')
                <th>{{ __('Acciones') }}</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $rol)
            <tr>
                <td>{{$rol->id}}</td>
                <td>{{ucfirst($rol->name)}}</td>
                @can('admin.roles.update','admin.roles.destroy')
                    <td>
                        <div class="btn-group flex-wrap">
                            <div class="btn-group">
                                <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    @can('admin.roles.update')
                                        <a onclick="event.preventDefault();editar({{$rol->id}});" href="#" class="dropdown-item" title="Editar">Editar</a> 
                                    @endcan
                                    @can('admin.roles.destroy')
                                        <a onclick="event.preventDefault();eliminar({{$rol->id}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a> 
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