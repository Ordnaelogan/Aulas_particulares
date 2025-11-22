<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Nova Aula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variáveis de Dark Mode (do seu index.blade.php) */
        :root {
            --bg-page: #1f2937; /* Fundo Escuro */
            --bg-card: #374151; /* Janela Central Escura */
            --text-light: #f3f4f6;
            --accent-primary: #f59e0b; /* AMARELO DOURADO (ADICIONAR) */
            --accent-secondary: #2dd4bf; /* CIANO/MINT */
            --accent-danger: #dc2626; /* Vermelho */
            --shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
        }
        
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: var(--bg-page); 
            padding: 40px;
            color: var(--text-light);
            line-height: 1.6;
        }
        .container-box { 
            max-width: 600px; 
            margin: auto;
            background: var(--bg-card); 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: var(--shadow); 
        }
        h1 { 
            color: var(--text-light); 
            font-size: 1.8rem; 
            margin-bottom: 20px; 
            border-bottom: 2px solid #4b5563;
            padding-bottom: 10px;
            font-weight: 700;
        }
        
        /* Formulário e Selects */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; font-size: 0.95rem; }
        .form-group input, 
        .form-group select { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #4b5563; 
            border-radius: 6px; 
            box-sizing: border-box;
            background-color: #4b5563; /* Cor de fundo do input */
            color: var(--text-light);
        }
        
        /* Botão de Salvar */
        .btn-submit { 
            padding: 10px 20px; 
            background-color: var(--accent-primary); /* Cor Dourada/Primária */
            color: var(--bg-card); 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-weight: bold;
            transition: opacity 0.2s;
        }
        .btn-submit:hover { opacity: 0.9; }

        /* Links */
        .link-back { 
            display: inline-block; 
            margin-top: 20px; 
            text-decoration: none; 
            color: #9ca3af; 
            font-weight: 600;
        }
        .link-back:hover { color: var(--accent-secondary); }

        /* Estilo para erros de validação */
        .alert-danger { 
            padding: 15px; 
            background-color: var(--accent-danger); 
            color: white; 
            border-radius: 6px; 
            margin-bottom: 20px; 
            box-shadow: var(--shadow);
        }
        .alert-danger ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <div class="container-box">
        
        <a href="{{ route('aulas.index') }}" class="link-back"><i class="fas fa-arrow-left me-2"></i> Voltar para a Lista de Aulas</a>

        <h1>AGENDAR NOVA AULA</h1>

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

        <!-- Formulário aponta para a rota 'aulas.store' (método POST) -->
        <form action="{{ route('aulas.store') }}" method="POST">
            @csrf <!-- Token de segurança OBRIGATÓRIO -->

            <div class="form-group">
                <label for="aluno_id">Aluno:</label>
                <select id="aluno_id" name="aluno_id" required>
                    <option value="">Selecione o Aluno</option>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                            {{ $aluno->nome }} ({{ $aluno->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="disciplina_id">Disciplina:</label>
                <select id="disciplina_id" name="disciplina_id" required>
                    <option value="">Selecione a Disciplina</option>
                    @foreach ($disciplinas as $disciplina)
                        <option value="{{ $disciplina->id }}" {{ old('disciplina_id') == $disciplina->id ? 'selected' : '' }}>
                            {{ $disciplina->nome }} (R$ {{ number_format($disciplina->valor_hora, 2, ',', '.') }}/h)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data da Aula:</label>
                <input type="date" id="data" name="data" value="{{ old('data') }}" required>
            </div>

            <div class="form-group">
                <label for="duracao_horas">Duração (Horas, Ex: 1.5 para 1h30m):</label>
                <input type="number" step="0.5" id="duracao_horas" name="duracao_horas" value="{{ old('duracao_horas') }}" required min="0.5">
            </div>

            <button type="submit" class="btn-submit"><i class="fas fa-calendar-plus me-2"></i> AGENDAR AULA</button>
        </form>
    </div>
</body>
</html>