<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;
use DB;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        $permisos = Permission::all();
        return view('admin.roles.index', compact('roles', 'permisos'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //valida datos de la solicitud
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:100',
            'permisos' => 'required',

        ]);

        //si todas las reglas son correctas registra
        if ($validator->passes()) {

            //Registro de un nuevo Rol
            $roles = Role::create($request->all());
            $roles->permissions()->sync($request->permisos);
        
            return response()->json([ 'success'=> 'Registro Exitoso']);

        }

        //sino envia msj de error
        return response()->json(['error'=>$validator->errors()]);
    }


    public function show($id)
    {
        $role = Role::find($id);


        $permisoRol = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_has_permissions.role_id', '=', $role->id)
                ->select('permissions.name')->get();

        // //envia en un json la respuesta
        return response()->json([
            'error' => true,
            'role'  => $role,
            'permisoRol'  => $permisoRol,
        ], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //verificamos que los campos no vengan vacios
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'permisos' => "required"

        ]);

        if ($validator->passes()) {

            $roles = Role::find($id);
            $roles->update($request->all());
            $roles->permissions()->sync($request->permisos);

            //Actualizar roles
            return response()->json([ 'success'=> 'Se asigno los roles correctamente']);

        }

     
        return response()->json(['error'=>$validator->errors()]);
    }

    public function destroy($id)
    {
        // Eliminar Rol

        $asignados = DB::table('model_has_roles')->where('role_id','=',$id)->count();

        if ($asignados==0) {

            $roles = Role::destroy($id);

            $estado = true;
            return response()->json([ 'success'=> 'Eliminación Exitosa']);

        }else{
            $estado = false;
            return response()->json(['error' =>'Este rol esta asignado a un Usuario ']);
        }

    }

    //actualizar listados
    public function getroles()
    {
        $roles = Role::all();

        $html = view('admin.roles.listado', compact('roles'))->render();
        return response()->json(compact('html'));
    }
}
