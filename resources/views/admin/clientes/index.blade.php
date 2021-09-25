@extends('adminlte::page')

@section('title', 'Clientes')

@section('plugins.Datatables' , true)
@section('plugins.Daterangepicker' , true)
@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">Listado de Clientes</div>
		</div>
		<div class="card-body">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-md-12">
						@can('admin.clientes.store')
							<div class="text-right">
								<button id="agregar" class="btn btn-rounded btn-outline-primary" type="button">
									<i class="icon wb-plus" aria-hidden="true"></i> Nuevo Registro
								</button>
							</div>
						@endcan
	                </div>
	            </div>
	        </div> 
	        <br>                         
	        <div class="tabla-listado table-responsive">
				@include('admin.clientes.listado')
	        </div>			
		</div>
	</div>
    <!-- Main Content End -->
    @include('admin.clientes.agregar')
    @include('admin.clientes.clientes_solicitudes')
    @include('admin.clientes.agregar_servicio')
    @include('admin.clientes.agregar_equipo')
	@include('admin.solicitudes.eliminar')
@stop

@section('js')
	<script src="{{ asset('js') }}/operaciones/clientes.js" defer=""></script>
	
@stop

