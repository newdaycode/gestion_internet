@extends('adminlte::page')

@section('title', 'Solicitudes')


@section('plugins.Datatables' , true)
@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">Solicitudes Nuevas</div>
		</div>
		<div class="card-body">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-md-12">
	                	@can('admin.solicitudes.store')
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
	            @include('admin/solicitudes/listado')
	        </div>			
		</div>
	</div>
    <!-- Main Content End -->
    @include('admin.solicitudes.agregar')
    @include('admin.solicitudes.editar')
    @include('admin.solicitudes.eliminar')
    @include('admin.solicitudes.procesar')
@stop

@section('js')

	<script src="{{ asset('vendor') }}/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js" defer=""></script>
	<script src="{{ asset('js') }}/operaciones/solicitudes.js" defer=""></script>
	
    
@stop

