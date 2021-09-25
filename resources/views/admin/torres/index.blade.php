@extends('adminlte::page')

@section('title', 'Torres')

@section('plugins.Datatables' , true)
@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">Listado de Torres</div>
		</div>
		<div class="card-body">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-md-12">
						@can('admin.torres.store')
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
	            @include('admin.torres.listado')
	        </div>			
		</div>
	</div>
    <!-- Main Content End -->
    @include('admin.torres.agregar')
    @include('admin.torres.antena')
    @include('admin.torres.editar')
    @include('admin.solicitudes.eliminar')
@stop

@section('js')

	<script src="{{ asset('vendor') }}/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js" defer=""></script>
	<script src="{{ asset('js') }}/operaciones/torres.js" defer=""></script>
	
    
@stop

