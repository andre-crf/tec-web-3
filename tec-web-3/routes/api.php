<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ItemRelatorioController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes — Relatórios
|--------------------------------------------------------------------------
|
| Registre aqui as rotas da API. Todas as rotas abaixo exigem
| autenticação via Sanctum (middleware 'auth:sanctum').
|
*/

Route::middleware('auth:sanctum')->group(function () {

    // Categorias (recurso completo)
    Route::apiResource('categorias', CategoriaController::class);

    // Relatórios (recurso completo)
    Route::apiResource('relatorios', RelatorioController::class);

    // Itens de um relatório (recurso aninhado)
    Route::apiResource('relatorios.itens', ItemRelatorioController::class);
});
