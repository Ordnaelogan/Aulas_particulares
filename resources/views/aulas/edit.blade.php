<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aula</title>
    <!-- Estilo CSS autônomo -->
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select { width: 95%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-submit { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .link-back { display: block; margin-top: 20px; text-decoration: none; color: #007bff; }
        /* Estilo para erros de validação */
        .alert-danger { padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 15px; }
        .alert-danger ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Aula Agendada</h1>

        <!-- Se houver erros de validação, mostra-os aqui em cima -->
        @if ($errors->any())
            <div class="alert-danger">
                <strong>Opa!</strong> Algo deu errado:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário aponta para 'aulas.update' e usa o método 'PUT' -->
        <form action="{{ route('aulas.update', $aula->id) }}" method="POST">
            @csrf <!-- Token de segurança OBRIGATÓRIO -->
            @method('PUT') <!-- Método HTTP para ATUALIZAÇÃO -->

            <div class="form-group">
                <label for="aluno_id">Aluno:</label>
                <!-- Preenche o select do Aluno com o valor atual ($aula->aluno_id) -->
                <select id="aluno_id" name="aluno_id" required>
                    <option value="">Selecione o Aluno</option>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ old('aluno_id', $aula->aluno_id) == $aluno->id ? 'selected' : '' }}>
                            {{ $aluno->nome }} ({{ $aluno->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="disciplina_id">Disciplina:</label>
                <!-- Preenche o select da Disciplina com o valor atual ($aula->disciplina_id) -->
                <select id="disciplina_id" name="disciplina_id" required>
                    <option value="">Selecione a Disciplina</option>
                    @foreach ($disciplinas as $disciplina)
                        <option value="{{ $disciplina->id }}" {{ old('disciplina_id', $aula->disciplina_id) == $disciplina->id ? 'selected' : '' }}>
                            {{ $disciplina->nome }} (R$ {{ number_format($disciplina->valor_hora, 2, ',', '.') }}/h)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data da Aula:</label>
                <!-- Converte a data para o formato YYYY-MM-DD para preencher o input type="date" -->
                <input type="date" id="data" name="data" value="{{ old('data', \Carbon\Carbon::parse($aula->data)->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="duracao_horas">Duração (Horas, Ex: 1.5 para 1h30m):</label>
                <!-- Preenche a duração atual -->
                <input type="number" step="0.5" id="duracao_horas" name="duracao_horas" value="{{ old('duracao_horas', $aula->duracao_horas) }}" required min="0.5">
            </div>

            <p style="color: #555; font-size: 0.9em; margin-top: 20px;">
                * O valor total será recalculado automaticamente ao atualizar. Valor atual: R$ {{ number_format($aula->valor_total, 2, ',', '.') }}
            </p>

            <button type="submit" class="btn-submit">Atualizar Aula</button>
        </form>

        <a href="{{ route('aulas.index') }}" class="link-back">Voltar para a Lista de Aulas</a>
    </div>
</body>
</html>