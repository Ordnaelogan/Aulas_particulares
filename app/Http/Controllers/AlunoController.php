<?php

namespace App\Http\Controllers;

use App\Models\Aluno; // 1. Importa a Model Aluno
use Illuminate\Http\Request;
// (Não precisamos importar o Controller PAI, pois o PHP já o faz automaticamente)

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     * (Este é o método que MOSTRA A LISTA de alunos)
     */
    public function index()
    {
        // 1. Usa a Model 'Aluno' para buscar todos os alunos no banco
        $alunos = Aluno::all();

        // 2. Retorna a View (página HTML) chamada 'alunos.index'
        //    e passa a variável $alunos para essa página
        // (O Laravel vai procurar por: resources/views/alunos/index.blade.php)
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     * (Método para mostrar o formulário de criação - Faremos no futuro)
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * (Método para salvar o novo aluno - Faremos no futuro)
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * (Método para ver detalhes de UM aluno - Faremos no futuro)
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * (Método para mostrar o formulário de edição - Faremos no futuro)
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * (Método para atualizar o aluno - Faremos no futuro)
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * (Método para excluir o aluno - Faremos no futuro)
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}