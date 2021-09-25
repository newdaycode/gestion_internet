<?php

namespace App\Http\Controllers\admin;

use App\Models\Enlace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class EnlaceController extends Controller
{

    public function index()
    {
        $enlaces = Enlace::all();

        return view('admin.enlaces.index', compact('enlaces'));
    }

    public function store(Request $request)
    {
        //valida datos de la Enlace
        $validator = Validator::make($request->all(), [

            'ssid' => 'required',
            'equipo' => 'required',
            'frecuencia' => 'required',
            'ip' => 'required|ip',
            'mac_address' => 'required|unique:enlaces',
            'lugar' => 'required',
            'observacion' => 'required|max:500|min:10',
            'modo' => 'required',

        ]);

        //si todas las reglas son correctas registra
        if ($validator->passes()) {

            //Registro de un nuevo enlace
            $enlace= Enlace::create([
                'ssid' => $request->input('ssid'),
                'equipo' => $request->input('equipo'),
                'frecuencia' => $request->input('frecuencia'),
                'ip' => $request->input('ip'),
                'mac_address' => $request->input('mac_address'),
                'lugar' => $request->input('lugar'),
                'observacion' => $request->input('observacion'),
                'modo' => $request->input('modo'),
                'users_id' => Auth::user()->id,
            ]);

            return response()->json([ 'success'=> 'Registro Exitoso']);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);
    }


    public function show($id)
    {
        $enlace = Enlace::find($id);

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'enlace'  => $enlace,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        //valida datos de la Enlace

        $validator = Validator::make($request->all(), [

            'ssid' => 'required',
            'equipo' => 'required',
            'frecuencia' => 'required',
            'ip' => 'required|ip',
            'mac_address' => "required|unique:enlaces,mac_address, $id",
            'lugar' => 'required',
            'observacion' => 'required|max:500|min:10',
            'modo' => 'required',

        ]);

        if ($validator->passes()) {

            $enlace = Enlace::find($id);
            $enlace->update($request->all());

            //Actualizar servicio
            return response()->json([ 'success'=> 'Registro Actualizado']);

        }

        
        return response()->json(['error'=>$validator->errors()]);
    }

    public function destroy($id)
    {
        $estado = false;
        
        $Enlace = Enlace::destroy($id);

        $estado = true;

        return response()->json([
            'estado' => $estado,
        ], 200);
    }

    //actualizar listado
    public function getenlaces()
    {
        $enlaces = Enlace::all();

        $html = view('admin.enlaces.listado', compact('enlaces'))->render();
        return response()->json(compact('html'));
    }    //actualizar listado



}
