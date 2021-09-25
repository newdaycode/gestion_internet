<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Validator;

class SolicitudController extends Controller
{

    public function index()
    {
        //consultar las solicitudes factibles        
        $solicitudes = Solicitud::where('estado' , Solicitud::PENDIENTE)->get();


        //enviar las solicitudes factibles a la vista
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function store(Request $request)
    {
        //valida datos de la solicitud
        $validator = Validator::make($request->all(), [

            'nombre_solicitante' => 'required|max:100',
            'slug' => 'required|unique:solicituds',
            // 'cd_rif' => 'required|numeric',
            'movil' => 'required|numeric',
            // 'fijo' => 'required|numeric',
            'email' => 'unique:users',
            'ubicacion' => 'required|max:100',
            'antena' => 'required|max:2',
            'observaciones' => 'required|max:500|min:10'

        ]);

        //si todas las reglas son correctas registra
        if ($validator->passes()) {

        //Registro de una nueva solicitud
            $solicitud= Solicitud::create([
                'nombre_solicitante' => $request->input('nombre_solicitante'),
                'slug' => $request->input('slug'),
                'cd_rif' => $request->input('cd_rif'),
                'movil' => $request->input('movil'),
                'fijo' => $request->input('fijo'),
                'email' => $request->input('email'),
                'ubicacion' => $request->input('ubicacion'),
                'antena' => $request->input('antena'),
                'observaciones' => $request->input('observaciones'),
                'estado' => Solicitud::PENDIENTE,
                'users_id' => Auth::user()->id,
            ]);

            return response()->json([ 'success'=> 'Registro Exitoso']);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);

    }

    public function show(Solicitud $solicitud, $id)
    {

        $solicitud = Solicitud::find($id);

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'solicitud'  => $solicitud,
        ], 200);
    }

    public function update(Request $request, Solicitud $solicitud, $id)
    {


        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'nombre_solicitante' => 'required|max:100',
            'slug' => "required|unique:solicituds,slug, $id",
            // 'cd_rif' => 'required|numeric',
            'movil' => 'required|numeric',
            // 'fijo' => 'required|numeric',
            'email' => 'unique:users',
            'ubicacion' => 'required|max:100',
            'antena' => 'required|max:2',
            'observaciones' => 'required|max:500|min:10'

        ]);

        if ($validator->passes()) {

            //Actualizar solicitud

            $solicitud = Solicitud::find($id);

            $solicitud->nombre_solicitante = $request->input('nombre_solicitante');
            $solicitud->slug = $request->input('slug');
            $solicitud->cd_rif = $request->input('cd_rif');
            $solicitud->movil = $request->input('movil');
            $solicitud->fijo = $request->input('fijo');
            $solicitud->email = $request->input('email');
            $solicitud->ubicacion = $request->input('ubicacion');
            $solicitud->antena = $request->input('antena');
            $solicitud->observaciones = $request->input('observaciones');
            $solicitud->users_id = Auth::user()->id;

            $solicitud->save();

            return response()->json([ 'success'=> 'Registro Actualizado']);

        }

     
        return response()->json(['error'=>$validator->errors()]);

    }


    public function destroy(Solicitud $solicitud, $id)
    {
        $estado = false;
        
        $solicitud = Solicitud::destroy($id);

        $estado = true;

        return response()->json([
            'estado' => $estado,
        ], 200);
    }

    //actualizar listados
    public function getsolicitudes($estado)
    {

        if ($estado === 'pendiente') {
            $solicitud = Solicitud::PENDIENTE;
            $listado = 'admin/solicitudes/listado';
        }elseif ($estado === 'no_factible') {
            $solicitud = Solicitud::NO_FACTIBLE;
            $listado = 'admin/no_factibles/listado';
        }else{
            $listado = 'admin/factibles/listado';
        }

        $solicitudes = Solicitud::where('estado' , $solicitud)->get();

        $html = view($listado, compact('solicitudes'))->render();
        return response()->json(compact('html'));
    }    

    //Procesar Solicitudes
    public function getprocesar(Request $request)
    {

        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'estado' => 'required',
            'descripcion' => 'required|max:500|min:10'

        ]);

        if ($validator->passes()) {

            //Actualizar solicitud
            $solicitud = Solicitud::find($request->procesar_data);

            if ($request->estado==1) {
                $estado = Solicitud::FACTIBLE;
            }else{
                $estado = Solicitud::NO_FACTIBLE;
            }

            $solicitud->estado = $estado;
            $solicitud->observaciones = $request->input('descripcion');
            $solicitud->users_id = Auth::user()->id;

            $solicitud->save();

            return response()->json([ 'success'=> 'Solicitud Procesada Exitosamente']);

        }

     
        return response()->json(['error'=>$validator->errors()]);
    }



}
