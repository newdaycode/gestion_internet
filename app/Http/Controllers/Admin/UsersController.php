<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Validator;
use DB;
class UsersController extends Controller
{

    // public function __construct(){
    //     $this->middleware('can:admin.users.index')->only('index')
    // }

    public function index()
    {

        $usuarios = User::all();

        $datos = [];

        foreach ($usuarios as $usuario) {
            $rol = Role::join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('model_has_roles.model_id', '=', $usuario->id)
                ->select('roles.name as nombre')->first();


            if($rol===null){

                $data = array ('id' => $usuario->id,'name' => $usuario->name,'email' => $usuario->email,'rol' => 'Sin Rol');
                array_push($datos, $data);

            }else{

                $data = array ('id' => $usuario->id,'name' => $usuario->name,'email' => $usuario->email,'rol' => $rol->nombre);
                array_push($datos, $data);
            }
        }

        $roles = Role::all();
        return view('admin.users.index', compact('datos', 'roles'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        
        $users = User::find($id);

        $rolesActual = Role::join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('model_has_roles.model_id', '=', $id)
                ->select('roles.name')->get();

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'users'  => $users,
            'roles'  => $rolesActual,
        ], 200);
    }

    public function update(Request $request, $id, User $users)
    {

        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'roles' => "required"

        ]);

        if ($validator->passes()) {

            $users = User::find($id);
            $users->roles()->sync($request->roles);

            //Actualizar solicitud
            return response()->json([ 'success'=> 'Se asigno los roles correctamente']);

        }

     
        return response()->json(['error'=>$validator->errors()]);
    }


    public function destroy($id)
    {
        //
    }

    //actualizar listados
    public function getusers()
    {
        $usuarios = User::all();

        $datos = [];

        foreach ($usuarios as $usuario) {
            $rol = Role::join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('model_has_roles.model_id', '=', $usuario->id)
                ->select('roles.name as nombre')->first();


            if($rol===null){

                $data = array ('id' => $usuario->id,'name' => $usuario->name,'email' => $usuario->email,'rol' => 'Sin Rol');
                array_push($datos, $data);

            }else{

                $data = array ('id' => $usuario->id,'name' => $usuario->name,'email' => $usuario->email,'rol' => $rol->nombre);
                array_push($datos, $data);
            }
        }

        $html = view('admin.users.listado', compact('datos'))->render();
        return response()->json(compact('html'));
    }



}
