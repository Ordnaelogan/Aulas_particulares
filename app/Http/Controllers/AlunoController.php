<?php

namespace App\Http\Controllers;

use App\Models\Aluno; // Importa a Model
use Illuminate\Http\Request; // Importante para o store() e update()

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     * (Listar todos)
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     * (Mostrar formulário de criação)
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     * (Salvar o novo aluno)
     */
    public function store(Request $request)
    {
        // 1. Validar os dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:alunos',
        ]);

        // 2. Salvar no banco
        Aluno::create($request->all());

        // 3. Redirecionar
        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     * (Ver detalhes de um aluno)
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     * (Mostrar formulário de edição)
     */
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     * (Atualizar o aluno no banco)
     */
    public function update(Request $request, Aluno $aluno)
    {
        // 1. Validação
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            // Regra: 'email' deve ser único, EXCETO para o aluno atual
            'email' => 'required|string|email|max:255|unique:alunos,email,' . $aluno->id,
        ]);

        // 2. Atualiza o aluno no banco de dados
        $aluno->update($request->all());

        // 3. Redireciona
        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     * (Este é o NOVO método para "Excluir" o aluno)
     */
    public function destroy(Aluno $aluno)
    {
        // O Laravel já encontrou o $aluno que queremos apagar

        // 1. Apaga o aluno do banco de dados
        $aluno->delete();

        // 2. Redireciona de volta para a listagem (index) com uma msg de sucesso
        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno excluído com sucesso!');
    }
}