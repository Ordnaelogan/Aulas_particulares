<?php

namespace App\Http\Controllers;

use App\Models\Aluno; // Importa a Model
use Illuminate\Http\Request; // Importante para o store() e update()

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:alunos',
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     * (Este é o NOVO método: MOSTRAR o formulário de edição)
     */
    public function edit(Aluno $aluno)
    {
        // O Laravel encontra o $aluno. Apenas retornamos a View.
        // O Laravel vai procurar por: resources/views/alunos/edit.blade.php
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     * (Este é o NOVO método: SALVAR a edição no banco)
     */
    public function update(Request $request, Aluno $aluno)
    {
        // 1. Validação (o email tem que ser único, mas ignoramos o email do aluno atual)
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:alunos,email,' . $aluno->id,
        ]);

        // 2. Salvar as alterações
        $aluno->update($request->all());

        // 3. Redirecionar
        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     * (Veremos este no futuro)
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}