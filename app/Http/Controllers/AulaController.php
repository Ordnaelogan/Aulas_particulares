<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Aluno;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    // ... métodos index, create, store (que estão OK) ...

    public function index()
    {
        // Certifica-se de que o método with(['aluno', 'disciplina']) está aqui para a LISTA
        $aulas = Aula::with(['aluno', 'disciplina'])->get(); 
        return view('aulas.index', compact('aulas'));
    }

    // ... create() e store() omitidos, assumindo que já estão implementados ...

    /**
     * Display the specified resource.
     * (CORREÇÃO AQUI: Garante que os relacionamentos estão carregados)
     */
    public function show(Aula $aula)
    {
        // Usa o load() para garantir que o Aluno e a Disciplina
        // estão carregados ANTES de serem passados para a View.
        $aula->load(['aluno', 'disciplina']);

        // Se o erro não for do load(), ele estará na sua View.
        return view('aulas.show', compact('aula'));
    }

    // ... edit(), update(), destroy() omitidos
}