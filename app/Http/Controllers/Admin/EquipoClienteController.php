<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Equipo;

class EquipoClienteController extends Controller
{

    public function index()
    {
        $equipos = Equipo::all();
        return view('admin.equipos.index', compact('equipos'));
    }


    public function store(Request $request)
    {
        //valida datos del equipo
        $validator = Validator::make($request->all(), [

            'tipo' => 'required',
            'modelo' => 'required',
            'frecuencia' => 'required',
            'descripcion' => 'required|max:500|min:10',
            'observacion' => 'required|max:500|min:10',
            'puerto' => 'required',

        ]);

        //si todas las reglas son correctas registra
        if ($validator->passes()) {

            //Registro de un nuevo equipo 
            $equipo= Equipo::create([
                'tipo' => $request->input('tipo'),
                'modelo' => $request->input('modelo'),
                'frecuencia' => $request->input('frecuencia'),
                'descripcion' => $request->input('descripcion'),
                'observacion' => $request->input('observacion'),
                'puerto' => $request->input('puerto'),
                'users_id' => Auth::user()->id,
            ]);

            return response()->json([ 'success'=> 'Registro Exitoso']);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);
    }

    public function show($id)
    {
        $equipo = Equipo::find($id);

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'equipo'  => $equipo,
        ], 200);
    }


    public function update(Request $request, $id)
    {
        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'tipo' => 'required',
            'modelo' => 'required',
            'frecuencia' => 'required',
            'descripcion' => 'required|max:500|min:10',
            'observacion' => 'required|max:500|min:10',
            'puerto' => 'required',

        ]);

        if ($validator->passes()) {

            $equipo = Equipo::find($id);
            $equipo->update($request->all());

            //Actualizar servicio
            return response()->json([ 'success'=> 'Registro Actualizado']);

        }

     
        return response()->json(['error'=>$validator->errors()]);
    }


    public function destroy($id)
    {
        $estado = false;
        
        $equipo = Equipo::destroy($id);

        $estado = true;

        return response()->json([
            'estado' => $estado,
        ], 200);
    }

    //actualizar listado
    public function getequipos()
    {
        $equipos = Equipo::all();

        $html = view('admin.equipos.listado', compact('equipos'))->render();
        return response()->json(compact('html'));
    }



}
