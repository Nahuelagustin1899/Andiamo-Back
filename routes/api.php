<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstacionController;
use App\Http\Controllers\ViajeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AuthController;


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

/* ESTACIONES */

Route::get('/estacion/index', [EstacionController::class, 'index'])
    ->name('estacion-index');

/* VIAJES */

Route::get('/viaje/index', [ViajeController::class, 'index'])
    ->name('viaje-index');

Route::post('/viaje', [ViajeController::class, 'store'])
    ->name('viaje-store');

Route::delete('/viaje/{id}', [ViajeController::class, 'delete'])
    ->name('viaje-delete');

Route::get('/viaje/show/{id}', [ViajeController::class, 'show'])
    ->name('viaje-show');

/* RESERVAS */

Route::get('/reserva/index', [ReservaController::class, 'index'])
    ->name('reserva-index');

Route::post('/reserva/store', [ReservaController::class, 'store'])
    ->name('reserva-store');

Route::put('/reserva/change', [ReservaController::class, 'change'])
    ->name('reserva-change');

/* AUTH */

Route::post('/auth/login', [AuthController::class, 'login'])
    ->name('auth-login');

Route::post('/auth/logout', [AuthController::class, 'logout'])
    ->name('auth-logout');
/* 
Route::prefix('auth')
    ->group(function() {
        Route::post('login', 'AuthController@login')
            ->name('auth.login');
        Route::post('logout', 'AuthController@logout')
            ->name('auth.logout');
    }); */


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
