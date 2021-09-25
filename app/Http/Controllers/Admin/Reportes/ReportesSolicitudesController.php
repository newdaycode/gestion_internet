<?php

namespace App\Http\Controllers\Admin\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use PDF;


class ReportesSolicitudesController extends Controller
{
    public function solicitudes(){
    	$solicitudes = Solicitud::all();

    	return view('admin.reportes.solicitudes.solicitudes', compact('solicitudes'));
    }

    public function exportar_solicitudes(){

    	$solicitudes = Solicitud::all();
    	$pdf = PDF::loadView('admin.reportes.solicitudes.pdf', compact('solicitudes'));
    	return $pdf->download('listado.pdf');

    }
}
