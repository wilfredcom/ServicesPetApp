<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

use App\Http\Controllers\v1\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\PrestadorServicioController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-clientes', [ClienteController::class, 'index']);
Route::get('/get-mascotas', [MascotaController::class, 'index']);
Route::get('/get-prestador-servicio', [PrestadorServicioController::class, 'index']);
