<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'personal']);


        $permission = Permission::create(['name' => 'admin.home', 'description' => 'Ver Dashboard'])->syncRoles([$role1, $role2]); 

        //solicitudes
        $permission = Permission::create(['name' => 'admin.solicitudes', 'description' => 'Gestionar Solicitudes'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.solicitudes.index', 'description' => 'Ver listado de solicitudes'])->syncRoles([$role1, $role2]); 
        $permission = Permission::create(['name' => 'admin.solicitudes.store', 'description' => 'Crear Solicitudes'])->syncRoles([$role1, $role2]);        
        $permission = Permission::create(['name' => 'admin.solicitudes.update', 'description' => 'Actualizar Solicitudes'])->syncRoles([$role1, $role2]);        
        $permission = Permission::create(['name' => 'admin.solicitudes.destroy', 'description' => 'Eliminar Solicitudes'])->syncRoles([$role1, $role2]);

        //procesar solicitudes       
        $permission = Permission::create(['name' => 'admin.procesar', 'description' => 'Procesar Solicitudes'])->syncRoles([$role1, $role2]);

        //solicitudes factibles
        $permission = Permission::create(['name' => 'admin.factibles', 'description' => 'Ver Listado de Solicitudes Factibles'])->syncRoles([$role1, $role2]); 

        //solicitudes no factibles
        $permission = Permission::create(['name' => 'admin.no_factibles', 'description' => 'Ver listado de folicitudes no factibles'])->syncRoles([$role1, $role2]); 

        //servicios
        $permission = Permission::create(['name' => 'admin.servicios', 'description' => 'Gestionar servicios'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.servicios.index', 'description' => 'Ver listado de servicios'])->syncRoles([$role1, $role2]); 
        $permission = Permission::create(['name' => 'admin.servicios.store', 'description' => 'Crear servicios'])->syncRoles([$role1, $role2]);         
        $permission = Permission::create(['name' => 'admin.servicios.update', 'description' => 'Actualizar servicios'])->syncRoles([$role1, $role2]);        
        $permission = Permission::create(['name' => 'admin.servicios.destroy', 'description' => 'Eliminar servicios'])->syncRoles([$role1, $role2]);        

        //antenas
        $permission = Permission::create(['name' => 'admin.antenas', 'description' => 'Gestionar antenas'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.antenas.index', 'description' => 'Ver listado de antenas'])->syncRoles([$role1, $role2]); 
        $permission = Permission::create(['name' => 'admin.antenas.store', 'description' => 'Crear antenas'])->syncRoles([$role1, $role2]);       
        $permission = Permission::create(['name' => 'admin.antenas.update', 'description' => 'Actualizar antenas'])->syncRoles([$role1, $role2]);        
        $permission = Permission::create(['name' => 'admin.antenas.destroy', 'description' => 'Eliminar antenas'])->syncRoles([$role1, $role2]);        

        //torres
        $permission = Permission::create(['name' => 'admin.torres', 'description' => 'Gestionar torres'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.torres.index', 'description' => 'Ver listado de torres'])->syncRoles([$role1, $role2]); 
        $permission = Permission::create(['name' => 'admin.torres.store', 'description' => 'Crear torres'])->syncRoles([$role1, $role2]);        
        $permission = Permission::create(['name' => 'admin.torres.update', 'description' => 'Actualizar torres'])->syncRoles([$role1, $role2]);        
        $permission = Permission::create(['name' => 'admin.torres.destroy', 'description' => 'Eliminar torres'])->syncRoles([$role1, $role2]);        

        //equipo_cliente
        $permission = Permission::create(['name' => 'admin.equipo_cliente', 'description' => 'Gestionar Equipo/cliente'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.equipo_cliente.index', 'description' => 'Ver listado de Equipo/cliente'])->syncRoles([$role1, $role2]); 
        $permission = Permission::create(['name' => 'admin.equipo_cliente.store', 'description' => 'Crear Equipo/cliente'])->syncRoles([$role1, $role2]);      
        $permission = Permission::create(['name' => 'admin.equipo_cliente.update', 'description' => 'Actualizar Equipo/cliente'])->syncRoles([$role1, $role2]);        
        $permission = Permission::create(['name' => 'admin.equipo_cliente.destroy', 'description' => 'Eliminar Equipo/cliente'])->syncRoles([$role1, $role2]);

        //usuarios
        $permission = Permission::create(['name' => 'admin.users', 'description' => 'Gestionar Usuarios'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.users.index', 'description' => 'Ver listado de Usuarios'])->syncRoles([$role1]); 
        // $permission = Permission::create(['name' => 'admin.users.store', 'description' => 'Crear Usuarios'])->syncRoles([$role1]);        
        $permission = Permission::create(['name' => 'admin.users.update', 'description' => 'Asignar Rol'])->syncRoles([$role1]);        
        $permission = Permission::create(['name' => 'admin.users.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);

        //Roles
        $permission = Permission::create(['name' => 'admin.roles', 'description' => 'Gestionar Roles'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver listado de Roles'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.roles.store', 'description' => 'Crear Roles'])->syncRoles([$role1]);      
        $permission = Permission::create(['name' => 'admin.roles.update', 'description' => 'Actualizar Roles'])->syncRoles([$role1]);        
        $permission = Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar Roles'])->syncRoles([$role1]);

        //Reportes
        $permission = Permission::create(['name' => 'admin.reportes_solicitudes', 'description' => 'Mostrar Resportes de Solicitudes'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.exportar_solicitudes', 'description' => 'Exportar solicitudes'])->syncRoles([$role1]);

        //enlaces
        $permission = Permission::create(['name' => 'admin.enlaces', 'description' => 'Gestionar Enlaces'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.enlaces.index', 'description' => 'Ver listado de Enlaces'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.enlaces.store', 'description' => 'Crear Enlaces'])->syncRoles([$role1]);      
        $permission = Permission::create(['name' => 'admin.enlaces.update', 'description' => 'Actualizar Enlaces'])->syncRoles([$role1]);        
        $permission = Permission::create(['name' => 'admin.enlaces.destroy', 'description' => 'Eliminar Enlaces'])->syncRoles([$role1]);

        //clientes
        $permission = Permission::create(['name' => 'admin.clientes', 'description' => 'Gestionar Clientes'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.clientes.index', 'description' => 'Ver listado de Clientes'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.clientes.store', 'description' => 'Crear Clientes'])->syncRoles([$role1]);      
        $permission = Permission::create(['name' => 'admin.clientes.update', 'description' => 'Actualizar Clientes'])->syncRoles([$role1]);        
        $permission = Permission::create(['name' => 'admin.clientes.destroy', 'description' => 'Eliminar Clientes'])->syncRoles([$role1]);

    }
}
