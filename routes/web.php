<?php

use Illuminate\Support\Facades\Route;

// 1. Importar os 3 controllers que acabámos de criar
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\AulaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde registamos as rotas web da nossa aplicação.
|
*/

// Rota padrão (/)
// Vamos redirecionar a página inicial para a lista de alunos
Route::get('/', function () {
    return redirect()->route('alunos.index');
});

// Rotas de Recurso (CRUD) para Alunos
// Isto cria automaticamente as rotas:
// alunos.index, alunos.create, alunos.store,
// alunos.show, alunos.edit, alunos.update, alunos.destroy
Route::resource('alunos', AlunoController::class);

// Rotas de Recurso (CRUD) para Disciplinas
Route::resource('disciplinas', DisciplinaController::class);

// Rotas de Recurso (CRUD) para Aulas
Route::resource('aulas', AulaController::class);