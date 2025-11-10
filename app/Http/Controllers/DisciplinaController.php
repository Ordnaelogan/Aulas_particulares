<?php

namespace App\Http\Controllers;

use App\Models\Disciplina; // Importa a Model Disciplina
use Illuminate\Http\Request; // Importante para store() e update()

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     * (Listar todas as disciplinas)
     */
    public function index()
    {
        $disciplinas = Disciplina::all();
        // Retorna a View (que faremos no Passo 2)
        return view('disciplinas.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     * (Mostrar formulário de criação)
     */
    public function create()
    {
        return view('disciplinas.create');
    }

    /**
     * Store a newly created resource in storage.
     * (Salvar a nova disciplina)
     */
    public function store(Request $request)
    {
        // 1. Validação
        $request->validate([
            'nome' => 'required|string|max:255|unique:disciplinas',
            'carga_horaria' => 'required|integer|min:1',
            'valor_hora' => 'required|numeric|min:0.01',
        ]);

        // 2. Salvar no banco
        Disciplina::create($request->all());

        // 3. Redirecionar
        return redirect()->route('disciplinas.index')
                         ->with('success', 'Disciplina cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     * (Ver detalhes de uma disciplina)
     */
    public function show(Disciplina $disciplina)
    {
        return view('disciplinas.show', compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     * (Mostrar formulário de edição)
     */
    public function edit(Disciplina $disciplina)
    {
        return view('disciplinas.edit', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     * (Atualizar a disciplina no banco)
     */
    public function update(Request $request, Disciplina $disciplina)
    {
        // 1. Validação (ignora o nome da disciplina atual para evitar erro de 'unique')
        $request->validate([
            'nome' => 'required|string|max:255|unique:disciplinas,nome,' . $disciplina->id,
            'carga_horaria' => 'required|integer|min:1',
            'valor_hora' => 'required|numeric|min:0.01',
        ]);

        // 2. Atualiza no banco
        $disciplina->update($request->all());

        // 3. Redireciona
        return redirect()->route('disciplinas.index')
                         ->with('success', 'Disciplina atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     * (Excluir a disciplina)
     */
    public function destroy(Disciplina $disciplina)
    {
        // 1. Apaga a disciplina do banco de dados
        $disciplina->delete();

        // 2. Redireciona
        return redirect()->route('disciplinas.index')
                         ->with('success', 'Disciplina excluída com sucesso!');
    }
}