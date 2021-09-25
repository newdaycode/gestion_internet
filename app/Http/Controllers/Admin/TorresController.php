<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Torre;
use App\Models\Antena;


class TorresController extends Controller
{

    public function index()
    {

        $torres = Torre::all();        
        $antenas = Antena::all();
        return view('admin.torres.index', compact('torres', 'antenas'));
    }

    public function store(Request $request)
    {
        //valida datos de la torre
        $validator = Validator::make($request->all(), [

            'ssid' => 'required|max:100',
            'acceso' => 'required',
            'capacidad' => 'required|numeric',
            'frecuencia' => 'required',
            'lugar' => 'required',
            'observacion' => 'required|max:500|min:10',
            'ip' => 'required|ip',
            'mac_address' => 'required|unique:torres',
            'antenas_id' => 'required',
        ]);

        //si todas las reglas son correctas registra
        if ($validator->passes()) {

            //Registro de una nueva torre
            $torre= Torre::create([
                'ssid' => $request->input('ssid'),
                'acceso' => $request->input('acceso'),
                'capacidad' => $request->input('capacidad'),
                'frecuencia' => $request->input('frecuencia'),
                'lugar' => $request->input('lugar'),
                'observacion' => $request->input('observacion'),
                'ip' => $request->input('ip'),
                'mac_address' => $request->input('mac_address'),
                'antenas_id' => $request->input('antenas_id'),
                'users_id' => Auth::user()->id,
            ]);

            return response()->json([ 'success'=> 'Registro Exitoso']);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);
    }


    public function show($id)
    {
        $torre = Torre::find($id);

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'torre'  => $torre,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'ssid' => 'required|max:100',
            'acceso' => 'required',
            'capacidad' => 'required|numeric',
            'frecuencia' => 'required',
            'lugar' => 'required',
            'observacion' => 'required|max:500|min:10',
            'ip' => 'required|ip',
            'mac_address' => 'required|unique:torres',
            'antenas_id' => 'required',

        ]);

        if ($validator->passes()) {

            $torre = torre::find($id);
            $torre->update($request->all());

            //Actualizar servicio
            return response()->json([ 'success'=> 'Registro Actualizado']);

        }

     
        return response()->json(['error'=>$validator->errors()]);
    }

    public function destroy($id)
    {
        $estado = false;
        
        $torre = Torre::destroy($id);

        $estado = true;

        return response()->json([
            'estado' => $estado,
        ], 200);
    }

    //actualizar listado
    public function gettorres()
    {
        $torres = Torre::all();

        $html = view('admin.torres.listado', compact('torres'))->render();
        return response()->json(compact('html'));
    }    //actualizar listado
    

    public function posttorres(Request $request)
    {
        //valida datos de la antena
        $validator = Validator::make($request->all(), [

            'modelo' => 'required|max:100',
            'tipo' => 'required',
            'polarizacion' => 'required',
            'ganancia' => 'required|numeric'

        ]);

        //si todas las reglas son correctas registra
        if ($validator->passes()) {

            //Registro de una nuevo antena
            $antena= Antena::create([
                'modelo' => $request->input('modelo'),
                'tipo' => $request->input('tipo'),
                'polarizacion' => $request->input('polarizacion'),
                'ganancia' => $request->input('ganancia'),
                'users_id' => Auth::user()->id,
            ]);

            $antenas = Antena::all();

            $html = view('admin.torres.lista_antenas', compact('antenas'))->render();
            return response()->json(['success'=> 'Registro Exitoso', 'html' => $html]);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);
    }



}
