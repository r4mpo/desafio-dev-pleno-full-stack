<?php

use App\Http\Controllers\Tarefas\TarefasCrudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::controller(AuthController::class)->prefix('usuario')->group(function () {
    Route::post('login', 'login');
    Route::post('registrar', 'registrar');
    Route::get('detalhar', 'detalhar')->middleware('token');
    Route::get('logout', 'logout')->middleware('token');
});

Route::resource('tarefas', TarefasCrudController::class)->middleware('token');;