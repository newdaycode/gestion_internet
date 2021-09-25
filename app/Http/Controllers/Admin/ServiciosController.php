<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicio;
use Validator;

class ServiciosController extends Controller
{

    public function index()
    {
        $servicios = Servicio::all();
        return view('admin.servicios.index', compact('servicios'));
    }

    public function store(Request $request)
    {
        //valida datos del servicio
        $validator = Validator::make($request->all(), [

            'plan' => 'required|max:100',
            'megas' => 'required',
            'monto' => 'required|numeric',
            'descripcion' => 'required|max:500|min:10'

        ]);

        //si todas las reglas son correctas registra
        if ($validator->passes()) {

            //Registro de una nuevo servicio
            $servicio= Servicio::create([
                'plan' => $request->input('plan'),
                'megas' => $request->input('megas'),
                'monto' => $request->input('monto'),
                'descripcion' => $request->input('descripcion'),
                'users_id' => Auth::user()->id,
            ]);

            return response()->json([ 'success'=> 'Registro Exitoso']);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);
    }

    public function show($id)
    {

        $servicio = Servicio::find($id);

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'servicio'  => $servicio,
        ], 200);
    }


    public function update(Request $request, $id)
    {
        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'plan' => 'required|max:100',
            'megas' => 'required',
            'monto' => 'required|numeric',
            'descripcion' => 'required|max:500|min:10'

        ]);

        if ($validator->passes()) {

            $servicio = Servicio::find($id);
            $servicio->update($request->all());

            //Actualizar servicio
            return response()->json([ 'success'=> 'Registro Actualizado']);

        }

     
        return response()->json(['error'=>$validator->errors()]);
    }

    public function destroy($id)
    {
        $estado = false;
        
        $servicio = Servicio::destroy($id);

        $estado = true;

        return response()->json([
            'estado' => $estado,
        ], 200);
    }

    //actualizar listados
    public function getservicios()
    {

        $servicios = Servicio::all();

        $html = view('admin.servicios.listado', compact('servicios'))->render();
        return response()->json(compact('html'));
    }   
}
