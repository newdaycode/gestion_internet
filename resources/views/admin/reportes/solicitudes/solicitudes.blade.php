@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('plugins.Datatables' , true)
@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">Reporte de Solicitudes</div>
		</div>
		<div class="card-body">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="text-right">
							@can('admin.exportar_solicitudes')
								<a href="{{ route('admin.exportar_solicitudes') }}" class="btn btn-rounded btn-primary" type="button">
									<i class="icon wb-plus" aria-hidden="true"></i> Exportar PDF
								</a> 
							@endcan
	                    </div>
	                </div>
	            </div>
	        </div> 
	        <br>                           
	        <div class="tabla-listado table-responsive">
	            @include('admin.reportes.solicitudes.listado')
	        </div>			
		</div>
	</div>
@stop

@section('js')

	<script src="{{ asset('vendor') }}/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js" defer=""></script>
	<script src="{{ asset('js') }}/operaciones/reportes.js" defer=""></script>
	
    
@stop

