<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Aluno;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     * (Listar todas as aulas)
     */
    public function index()
    {
        $aulas = Aula::with(['aluno', 'disciplina'])->get();
        return view('aulas.index', compact('aulas'));
    }

    /**
     * Show the form for creating a new resource.
     * (Mostrar formulário de criação de aula)
     */
    public function create()
    {
        $alunos = Aluno::all();
        $disciplinas = Disciplina::all();

        if ($alunos->isEmpty() || $disciplinas->isEmpty()) {
            return redirect()->route('aulas.index')->with('error', 'É necessário cadastrar alunos e disciplinas antes de agendar uma aula.');
        }

        return view('aulas.create', compact('alunos', 'disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     * (Salvar a nova aula)
     */
    public function store(Request $request)
    {
        // 1. Validação
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
            'data' => 'required|date',
            'duracao_horas' => 'required|numeric|min:0.5',
        ]);

        // 2. Lógica para CALCULAR o valor total
        $disciplina = Disciplina::find($request->disciplina_id);
        $valor_total = $disciplina->valor_hora * $request->duracao_horas;

        // 3. Criar e salvar a aula no banco
        Aula::create([
            'aluno_id' => $request->aluno_id,
            'disciplina_id' => $request->disciplina_id,
            'data' => $request->data,
            'duracao_horas' => $request->duracao_horas,
            'valor_total' => $valor_total, // Salva o valor calculado
        ]);

        // 4. Redirecionar
        return redirect()->route('aulas.index')
                         ->with('success', 'Aula agendada com sucesso! Valor total calculado: R$ ' . number_format($valor_total, 2, ',', '.'));
    }

    /**
     * Display the specified resource.
     * (Ver detalhes)
     */
    public function show(Aula $aula)
    {
        $aula->load(['aluno', 'disciplina']); // Garante o carregamento dos dados relacionados
        return view('aulas.show', compact('aula'));
    }

    /**
     * Show the form for editing the specified resource.
     * (Este é o NOVO método para MOSTRAR o formulário de edição)
     */
    public function edit(Aula $aula)
    {
        // Precisamos dos dados relacionados para preencher os selects
        $alunos = Aluno::all();
        $disciplinas = Disciplina::all();
        
        // Retorna a view de edição, passando a aula, alunos e disciplinas
        return view('aulas.edit', compact('aula', 'alunos', 'disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     * (Este é o NOVO método para SALVAR a edição)
     */
    public function update(Request $request, Aula $aula)
    {
        // 1. Validação
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
            'data' => 'required|date',
            'duracao_horas' => 'required|numeric|min:0.5',
        ]);

        // 2. Lógica para CALCULAR o novo valor total (baseado na nova disciplina)
        $disciplina = Disciplina::find($request->disciplina_id);
        $novo_valor_total = $disciplina->valor_hora * $request->duracao_horas;

        // 3. Salvar a atualização
        $aula->update([
            'aluno_id' => $request->aluno_id,
            'disciplina_id' => $request->disciplina_id,
            'data' => $request->data,
            'duracao_horas' => $request->duracao_horas,
            'valor_total' => $novo_valor_total, // Salva o novo valor calculado
        ]);

        // 4. Redirecionar
        return redirect()->route('aulas.index')
                         ->with('success', 'Aula atualizada com sucesso! Novo valor total: R$ ' . number_format($novo_valor_total, 2, ',', '.'));
    }

    /**
     * Remove the specified resource from storage.
     * (Este é o NOVO método para EXCLUIR)
     */
    public function destroy(Aula $aula)
    {
        // 1. Apaga a aula
        $aula->delete();

        // 2. Redireciona
        return redirect()->route('aulas.index')
                         ->with('success', 'Aula excluída com sucesso!');
    }
}