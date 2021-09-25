@extends('adminlte::page')

@section('title', 'Usuarios')


@section('plugins.Datatables' , true)

@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">Listado de Usuarios</div>
		</div>
		<div class="card-body">                          
	        <div class="tabla-listado table-responsive">
	            @include('admin/users/listado')
	        </div>		
		</div>
	</div>
    <!-- Main Content End -->
    @include('admin/users/editar')
@stop

@section('js')

	<script src="{{ asset('vendor') }}/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js" defer=""></script>
	<script src="{{ asset('js') }}/operaciones/users.js" defer=""></script>
	
    
@stop

