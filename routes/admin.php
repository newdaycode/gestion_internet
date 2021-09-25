<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SolicitudController;
use App\Http\Controllers\Admin\SolicitudFactibleController;
use App\Http\Controllers\Admin\SolicitudNoFactibleController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiciosController;
use App\Http\Controllers\Admin\AntenaController;
use App\Http\Controllers\Admin\TorresController;
use App\Http\Controllers\Admin\EquipoClienteController;
use App\Http\Controllers\Admin\EnlaceController;
use App\Http\Controllers\Admin\Reportes\ReportesSolicitudesController;
use App\Http\Controllers\Admin\ClienteController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Route solicitudes en Espera
Route::resource('solicitudes', SolicitudController::class)->middleware('can:admin.solicitudes')->only('index','store','show','update','destroy')->names('admin.solicitudes');
Route::get('listado_solicitudes/{estado}', [SolicitudController::class, 'getsolicitudes'])->name('admin.listado');

Route::post('procesar', [SolicitudController::class, 'getprocesar'])->middleware('can:admin.procesar')->name('admin.procesar');
//Route solicitudes factibles

Route::get('factibles', [SolicitudFactibleController::class, 'index'])->middleware('can:admin.factibles')->name('admin.factibles');
//Route solicitudes no factibles

Route::get('no_factibles', [SolicitudNoFactibleController::class, 'index'])->middleware('can:admin.no_factibles')->name('admin.no_factibles');

//Route servicios
Route::resource('servicios', ServiciosController::class)->middleware('can:admin.servicios')->only('index','store','show','update','destroy')->names('admin.servicios');
Route::get('listado_servicios', [ServiciosController::class, 'getservicios'])->name('admin.listado_servicios');

//Route Antena
Route::resource('antenas', AntenaController::class)->middleware('can:admin.antenas')->only('index','store','show','update','destroy')->names('admin.antenas');
Route::get('listado_antenas', [AntenaController::class, 'getantenas'])->name('admin.listado_antenas');

//Route Torre
Route::resource('torres', TorresController::class)->middleware('can:admin.torres')->only('index','store','show','update','destroy')->names('admin.torres');
Route::get('listado_torres', [TorresController::class, 'gettorres'])->name('admin.listado_torres');
Route::post('antenas_torres', [TorresController::class, 'posttorres'])->name('admin.antenas_torres');

//Route Equipo/Cliente
Route::resource('equipo_cliente', EquipoClienteController::class)->middleware('can:admin.equipo_cliente')->only('index','store','show','update','destroy')->names('admin.equipo_cliente');
Route::get('listado_equipos', [EquipoClienteController::class, 'getequipos'])->name('admin.listado_equipos');

//Route Enlaces
Route::resource('enlaces', EnlaceController::class)->middleware('can:admin.enlaces')->only('index','store','show','update','destroy')->names('admin.enlaces');
Route::get('listado_enlaces', [EnlaceController::class, 'getenlaces'])->name('admin.listado_enlaces');

//Route de Usuario
Route::resource('users', UsersController::class)->middleware('can:admin.users')->only('index','store','show','update','destroy')->names('admin.users');
Route::get('listado_users', [UsersController::class, 'getusers'])->name('admin.listado_users');

//Route de Roles y permisos
Route::resource('roles', RoleController::class)->middleware('can:admin.roles')->only('index','store','show','update','destroy')->names('admin.roles');
Route::get('listado_roles', [RoleController::class, 'getroles'])->name('admin.listado_roles');

//Route de Reportes
Route::get('reportes_solicitudes', [ReportesSolicitudesController::class, 'solicitudes'])->middleware('can:admin.reportes_solicitudes')->name('admin.reportes_solicitudes');
Route::get('exportar_solicitudes', [ReportesSolicitudesController::class, 'exportar_solicitudes'])->middleware('can:admin.exportar_solicitudes')->name('admin.exportar_solicitudes');

//Route de Clientes
Route::resource('clientes', ClienteController::class)->middleware('can:admin.clientes')->only('index','store','show','update','destroy')->names('admin.clientes');
Route::get('solicitudes_clientes', [ClienteController::class, 'getsolicitudes'])->name('admin.solicitudes_clientes');
Route::get('listado_clientes', [ClienteController::class, 'getClientes'])->name('admin.listado_clientes');
Route::post('clientes_servicio', [ClienteController::class, 'postservicios'])->name('admin.clientes_servicio');
Route::post('clientes_equipo', [ClienteController::class, 'postequipos'])->name('admin.clientes_equipo');


