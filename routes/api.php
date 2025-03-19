<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Infos\EnderecosController;
use App\Http\Controllers\Tarefas\TarefasCrudController;

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

Route::controller(AuthController::class)->prefix('usuario')->group(function () {
    Route::post('login', 'login');
    Route::post('registrar', 'registrar');
    Route::get('detalhar', 'detalhar')->middleware('token');
    Route::get('logout', 'logout')->middleware('token');
});

Route::resource('tarefas', TarefasCrudController::class)->middleware('token');

Route::controller(EnderecosController::class)->prefix('enderecos')->middleware('token')->group(function () {
    Route::get('/', 'consultar');
    Route::post('/atualizar', 'atualizar');
});