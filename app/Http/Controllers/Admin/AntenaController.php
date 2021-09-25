<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Antena;

class AntenaController extends Controller
{

    public function index()
    {
        $antenas = Antena::all();
        return view('admin.antenas.index', compact('antenas'));
    }

    public function store(Request $request)
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

            return response()->json([ 'success'=> 'Registro Exitoso']);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);
    }

    public function show($id)
    {

        $antena = Antena::find($id);

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'antena'  => $antena,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'modelo' => 'required|max:100',
            'tipo' => 'required',
            'polarizacion' => 'required',
            'ganancia' => 'required|numeric'

        ]);

        if ($validator->passes()) {

            $antena = Antena::find($id);
            $antena->update($request->all());

            //Actualizar servicio
            return response()->json([ 'success'=> 'Registro Actualizado']);

        }

     
        return response()->json(['error'=>$validator->errors()]);
    }

    public function destroy($id)
    {
        $estado = false;
        
        $antena = Antena::destroy($id);

        $estado = true;

        return response()->json([
            'estado' => $estado,
        ], 200);
    }    

    //actualizar listado
    public function getantenas()
    {
        $antenas = Antena::all();

        $html = view('admin.antenas.listado', compact('antenas'))->render();
        return response()->json(compact('html'));
    }
}
