<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudFactibleController extends Controller
{
    public function index()
    {
    	//consulta que las colicitudes sean factibles
        $solicitudes = Solicitud::where('estado' , Solicitud::FACTIBLE)->get();

        return view('admin.factibles.index', compact('solicitudes'));
    }
}
