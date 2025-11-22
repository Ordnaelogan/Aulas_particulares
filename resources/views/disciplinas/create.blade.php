<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nova Disciplina</title>
    
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
        
        /* Formulário */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; font-size: 0.95rem; }
        .form-group input[type="text"], 
        .form-group input[type="number"],
        .form-group input[type="email"] { 
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
        
        <a href="{{ route('disciplinas.index') }}" class="link-back"><i class="fas fa-arrow-left me-2"></i> Voltar para a Lista de Disciplinas</a>

        <h1>ADICIONAR NOVA DISCIPLINA</h1>

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

        <!-- Formulário aponta para a rota 'disciplinas.store' (método POST) -->
        <form action="{{ route('disciplinas.store') }}" method="POST">
            @csrf <!-- Token de segurança do Laravel (OBRIGATÓRIO) -->

            <div class="form-group">
                <label for="nome">Nome da Disciplina:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="carga_horaria">Carga Horária (em horas):</label>
                <input type="number" id="carga_horaria" name="carga_horaria" value="{{ old('carga_horaria') }}" required min="1">
            </div>

            <div class="form-group">
                <label for="valor_hora">Valor por Hora (R$):</label>
                <input type="text" id="valor_hora" name="valor_hora" value="{{ old('valor_hora') }}" required>
            </div>

            <button type="submit" class="btn-submit"><i class="fas fa-save me-2"></i> SALVAR DISCIPLINA</button>
        </form>
    </div>
</body>
</html>