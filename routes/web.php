<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\autoController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\despachoController;
use App\Http\Controllers\detalleController;
use App\Http\Controllers\estadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\motorController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\unidadController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ventaController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [welcomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashController::class, 'index']);
    Route::get('/profile', [UsuarioController::class, 'profile']);
    Route::resource('/auto', autoController::class)->names('auto');
    Route::resource('/unidad', unidadController::class)->names('unidad');
    Route::resource('/estado', estadoController::class)->names('estado');
    Route::resource('/motor', motorController::class)->names('motor');
    Route::resource('/cliente', clienteController::class)->names('cliente');
    Route::resource('/venta', ventaController::class)->names('ventas');
    Route::resource('/detalle', detalleController::class)->names('detalles');
    Route::resource('/despacho', despachoController::class)->names('despacho');
    Route::resource('/factura', FacturaController::class)->names('factura');
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisoController::class)->names('permisos');
    Route::resource('/asignar', AsignarController::class)->names('asignar');
});
