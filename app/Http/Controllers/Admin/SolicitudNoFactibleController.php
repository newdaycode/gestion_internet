<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Http\Controllers\Controller;

class SolicitudNoFactibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consulta que las colicitudes sean factibles
        $solicitudes = Solicitud::where('estado' , Solicitud::NO_FACTIBLE)->get();

        return view('admin.no_factibles.index', compact('solicitudes'));
    }

}
