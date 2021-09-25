<table class="table dataTable" data-plugin="dataTable" id="datatable">
    <thead>
        <tr>
		  	<th>{{ __('ID') }}</th>
		  	<th>{{ __('Nombre') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Rol') }}</th>
            <th>{{ __('Acciones') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datos as $usuario)
            <tr>
                <td>{{$usuario['id']}}</td>
                <td>{{ucfirst($usuario['name'])}}</td> 
                <td>{{$usuario['email']}}</td>
                <td>
                    @if ($usuario['rol']=='Sin Rol')
                        <span class="badge bg-warning">{{ucfirst($usuario['rol'])}}</span>
                    @else
                        <span class="badge bg-green">{{ucfirst($usuario['rol'])}}</span>
                    @endif
                </td>
                <td>
                    @if($usuario['email']==Auth::user()->email)
                        <a href="{{ url('user/profile') }}" class="btn btn-rounded btn-success btn-sm" title="Perfil">Perfil</a>
                    @else
                        @can('admin.users.update','admin.users.destroy')
                            <div class="btn-group flex-wrap">
                                <div class="btn-group">
                                    <button class="btn btn-rounded btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opciones</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        @can('admin.users.update')
                                            <a onclick="event.preventDefault();editar({{$usuario['id']}});" href="#" class="dropdown-item" title="Asignar Rol">Asignar Rol</a>
                                        @endcan
                                        <!-- @can('admin.users.destroy') 
                                            <a onclick="event.preventDefault();eliminar({{$usuario['id']}});" href="#" class="dropdown-item" title="Eliminar">Eliminar</a>
                                        @endcan -->
                                    </div>
                                </div>
                            </div>
                        @endcan
                    @endif                   
                </td>
            </tr>	                         	
        @endforeach 
    </tbody>
</table>