@extends('adminlte::page')

@section('title', 'Factibles')


@section('plugins.Datatables' , true)

@section('content')
	<div class="card">
		<div class="card-header">
			<div class="card-title">Solicitudes Factibles</div>
		</div>
		<div class="card-body">                          
	        <div class="tabla-listado table-responsive">
	            @include('admin/factibles/listado')
	        </div>		
		</div>
	</div>
    <!-- Main Content End -->
@stop

@section('js')

	<script src="{{ asset('vendor') }}/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js" defer=""></script>
	<script src="{{ asset('js') }}/operaciones/factibles.js" defer=""></script>
	
    
@stop

