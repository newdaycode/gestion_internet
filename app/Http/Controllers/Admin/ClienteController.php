<?php

namespace App\Http\Controllers\admin;

use App\Models\Cliente;
use App\Models\Solicitud;
use App\Models\Servicio;
use App\Models\Torre;
use App\Models\Equipo;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class ClienteController extends Controller
{

    public function index()
    {
        $solicitudes= [];
        $servicios = Servicio::all();
        $conexiones = Torre::all();
        $equipos = Equipo::all();
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('solicitudes', 'servicios', 'conexiones', 'equipos','clientes'));
    }

    public function store(Request $request)
    {
        //valida datos de la solicitud
        $validator = Validator::make($request->all(), [

            'cd_rif' => 'required|numeric',
            'nombre_solicitante' => 'required|max:100',
            'usuario' => 'required|unique:clientes',
            'movil' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:clientes',
            'ubicacion' => 'required',
            'observaciones' => 'required|max:500|min:10',
            'servicios_id' => 'required|numeric',
            'fecha_i' => 'required|date',
            'costo' => 'required|numeric',
            'torres_id' => 'required|numeric',
            'costo_equipo' => 'required|numeric',
            'equipos_id' => 'required|numeric',
            'otros_equi' => 'required',
            'costo_otro_equipo' => 'required|numeric',
            'ip' => 'required|ip|unique:clientes',
            'mac_address' => 'required|regex:/^([0-9\.]*)$/|unique:clientes',

        ]);

        //si todas las reglas son correctas registra
        if ($validator->passes()) {

            $nuevafecha = strtotime ( '+1 month' , strtotime ( $request->input('fecha_i') ) ) ;
            $fecha_c = date ( 'Y-m-d' , $nuevafecha ); 

            //Registro de un nuevo cliente
            $cliente= Cliente::create([
                'cd_rif' => $request->input('cd_rif'),
                'nombre_cliente' => $request->input('nombre_solicitante'),
                'usuario' => $request->input('usuario'),
                'movil' => $request->input('movil'),
                'fijo' => $request->input('fijo'),
                'email' => $request->input('email'),
                'ubicacion' => $request->input('ubicacion'),
                'observaciones' => $request->input('observaciones'),
                'servicios_id' => $request->input('servicios_id'),
                'fecha_i' => $request->input('fecha_i'),
                'fecha_c' => $fecha_c,
                'vencido' => $fecha_c,
                'costo' => $request->input('costo'),
                'torres_id' => $request->input('torres_id'),
                'costo_equi' => $request->input('costo_equipo'),
                'equipos_id' => $request->input('equipos_id'),
                'otros_equi' => $request->input('otros_equi'),
                'costo_otro_equi' => $request->input('costo_otro_equipo'),
                'ip' => $request->input('ip'),
                'mac_address' => $request->input('mac_address'),
                'users_id' => Auth::user()->id,
            ]);

            return response()->json([ 'success'=> 'Registro Exitoso']);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);
    }


    public function show(Cliente $cliente)
    {
        $cliente = Cliente::find($cliente->id);

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'cliente'  => $cliente,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'cd_rif' => 'required|numeric',
            'nombre_solicitante' => 'required|max:100',
            'usuario' => "required|unique:clientes,usuario,$id",
            'movil' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => "required|email|unique:clientes,email,$id",
            'ubicacion' => 'required',
            'observaciones' => 'required|max:500|min:10',
            'servicios_id' => 'required|numeric',
            'fecha_i' => 'required|date',
            'costo' => 'required|numeric',
            'torres_id' => 'required|numeric',
            'costo_equipo' => 'required|numeric',
            'equipos_id' => 'required|numeric',
            'otros_equi' => 'required',
            'costo_otro_equipo' => 'required|numeric',
            'ip' => "required|ip|unique:clientes,ip,$id",
            'mac_address' => "required|regex:/^([0-9\.]*)$/|unique:clientes,mac_address,$id",
        ]);

        if ($validator->passes()) {

            //Actualizar cliente

            $nuevafecha = strtotime ( '+1 month' , strtotime ( $request->input('fecha_i') ) ) ;
            $fecha_c = date ( 'Y-m-d' , $nuevafecha );

            $cliente = Cliente::find($id);
            $cliente->cd_rif = $request->input('cd_rif');
            $cliente->nombre_cliente = $request->input('nombre_solicitante');
            $cliente->usuario = $request->input('usuario');
            $cliente->movil = $request->input('movil');
            $cliente->fijo = $request->input('fijo');
            $cliente->email = $request->input('email');
            $cliente->ubicacion = $request->input('ubicacion'); 
            $cliente->observaciones = $request->input('observaciones');            
            $cliente->servicios_id = $request->input('servicios_id');
            $cliente->fecha_i = $request->input('fecha_i');
            $cliente->fecha_c = $fecha_c;
            $cliente->vencido = $fecha_c;
            $cliente->costo = $request->input('costo');
            $cliente->torres_id = $request->input('torres_id');
            $cliente->costo_equi = $request->input('costo_equipo');
            $cliente->equipos_id = $request->input('equipos_id');
            $cliente->otros_equi = $request->input('otros_equi');
            $cliente->costo_otro_equi = $request->input('costo_otro_equipo');
            $cliente->ip = $request->input('ip');
            $cliente->mac_address = $request->input('mac_address');
            $cliente->users_id = Auth::user()->id;

            $cliente->save();

            return response()->json([ 'success'=> 'Registro Actualizado']);

        }

     
        return response()->json(['error'=>$validator->errors()]);
    }


    public function destroy(Cliente $cliente)
    {
        $estado = false;
        
        $cliente = Cliente::destroy($cliente->id);

        $estado = true;

        return response()->json([
            'estado' => $estado,
        ], 200);
    }


    public function getsolicitudes(){


        $solicitudes = Solicitud::doesntHave('clientes')
                                ->where('estado' , Solicitud::FACTIBLE)->get();
        $html = view('admin.clientes.listado_solcitudes', compact('solicitudes'))->render();
        return response()->json(compact('html'));
    }


    //agregar nuevo servicios en cliente
    public function postservicios(Request $request){

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

            $servicios = Servicio::all();

            $html = view('admin.clientes.lista_servicios', compact('servicios'))->render();
            return response()->json(['success'=> 'Registro Exitoso', 'html' => $html]);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);



    }

    public function postequipos(Request $request){

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
        

            $equipos = Equipo::all();

            $html = view('admin.clientes.lista_equipos', compact('equipos'))->render();
            return response()->json(['success'=> 'Registro Exitoso', 'html' => $html]);

        }
        
        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);


    }

    public function getClientes(){

        $clientes = Cliente::all();

        $html = view('admin.clientes.listado', compact('clientes'))->render();
        return response()->json(compact('html'));
    }


}
