<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ... Rotas de Login e Dashboard aqui...

require __DIR__.'/auth.php';

// ROTAS PROTEGIDAS PARA O CRUD (SOMENTE USUÁRIOS LOGADOS)
Route::middleware('auth')->group(function () {
    
    // Rotas de Alunos (index, create, store, show, edit, update, destroy)
    Route::resource('alunos', App\Http\Controllers\AlunoController::class);

    // Rotas de Disciplinas
    Route::resource('disciplinas', App\Http\Controllers\DisciplinaController::class);

    // Rotas de Aulas
    Route::resource('aulas', App\Http\Controllers\AulaController::class);
    
});
