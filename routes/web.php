<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\AulaController; 

// Rotas de Recursos (CRUD) que conferimos nos seus Controllers
Route::resource('alunos', AlunoController::class);
Route::resource('disciplinas', DisciplinaController::class);
Route::resource('aulas', AulaController::class);

// Rota principal que chama a nova View
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Outras rotas que você tinha (se houver)