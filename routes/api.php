<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AtividadesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BoletosController;
use App\Http\Controllers\ConfigAtividadesController;
use App\Http\Controllers\ConfigSetoresController;
use App\Http\Controllers\ConfigTarefasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\SetoresController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\CepController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['apiJWT'])->group(function () {


    Route::resource('empresas', EmpresasController::class);
    //Route::post('empresas', [EmpresasController::class, 'empresas']);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('tarefas', TarefasController::class);
    Route::resource('setores', SetoresController::class);
    Route::resource('boletos', BoletosController::class);
    Route::resource('atividades', AtividadesController::class);
    Route::resource('relatorios', RelatoriosController::class);

    Route::resource('config-tarefas', ConfigTarefasController::class);
    Route::resource('config-atividades', ConfigAtividadesController::class);
    Route::resource('config-setores', ConfigSetoresController::class);

    Route::get('auth/me', [AuthController::class, 'me']);
    Route::get('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/refresh', [AuthController::class, 'refresh']);
    Route::get('/users', [UserController::class, 'index']);
});

Route::get('/cep/{cep}', [CepController::class, 'get']);
