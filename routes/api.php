<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstacionController;
use App\Http\Controllers\ViajeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/* EMPRESA */

Route::get('/empresa/index', [EmpresaController::class, 'index'])
    ->name('empresa-index');

Route::delete('/empresa/{id}', [EmpresaController::class, 'delete'])
    ->name('empresa-delete');

Route::post('/empresa', [EmpresaController::class, 'store'])
    ->name('empresa-store'); 

Route::post('/empresa/editar/{id}', [EmpresaController::class, 'edit'])
    ->name('empresa-edit'); 

/* ESTACIONES */

Route::get('/estacion/index', [EstacionController::class, 'index'])
    ->name('estacion-index');

/* VIAJES */

Route::get('/viaje/index', [ViajeController::class, 'index'])
    ->name('viaje-index');

Route::get('/viaje/index/empresa', [ViajeController::class, 'indexEmpresa'])
    ->name('viaje-index-empresa');

Route::get('/viaje/index/select', [ViajeController::class, 'indexTraerSelect'])
    ->name('viaje-index-select');

Route::get('/viaje/index/select2', [ViajeController::class, 'indexTraerSelect2'])
    ->name('viaje-index-select2');

Route::post('/viaje', [ViajeController::class, 'store'])
    ->name('viaje-store');

Route::delete('/viaje/{id}', [ViajeController::class, 'delete'])
    ->name('viaje-delete');

Route::get('/viaje/show/{id}', [ViajeController::class, 'show'])
    ->name('viaje-show');

Route::put('/viaje/edit/{id}', [ViajeController::class, 'edit'])
    ->name('viaje-edit');

/* RESERVAS */

Route::get('/reserva/index', [ReservaController::class, 'index'])
    ->name('reserva-index');

Route::get('/reserva/indexempresa', [ReservaController::class, 'indexEmpresa'])
    ->name('reserva-index-empresa');

Route::post('/reserva/store', [ReservaController::class, 'store'])
    ->name('reserva-store');

Route::put('/reserva/change', [ReservaController::class, 'change'])
    ->name('reserva-change');
    
Route::get('/reserva/viajes/{id}', [ReservaController::class, 'reservasViajes'])
    ->name('reserva-viajes');

/* AUTH */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/auth')
    ->group(function() {
        Route::post('/login', [UserController::class, 'login'])
            ->name('auth.login');
        Route::post('/logout', [UserController::class, 'logout'])
            ->name('/auth.logout');
        Route::post('/registrarse', [UserController::class, 'registrarse'])
            ->name('/auth.registrarse');
        Route::post('/editar/{id}', [UserController::class, 'edit'])
            ->name('auth.edit');
    });


