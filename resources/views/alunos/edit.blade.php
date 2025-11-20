<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <style>
        :root {
            --primary: #1e3a8a; /* Azul escuro (Para botões e títulos) */
            --success: #059669; /* Verde (Se fosse adicionar) */
            --background-color: #f0f4f8; /* Fundo suave e limpo */
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: var(--background-color); 
            display: flex; /* Centraliza a caixa na tela */
            justify-content: center; 
            align-items: center; 
            min-height: 100vh;
        }
        .container-box { 
            max-width: 550px; /* Um pouco maior que o seu original */
            background: white; 
            padding: 30px; 
            border-radius: 12px; /* Bordas suaves */
            box-shadow: var(--shadow); /* Sombra de software */
            width: 90%;
        }
        h1 { 
            color: var(--primary); 
            border-bottom: 1px solid #e0e7ff; /* Linha de separação discreta */
            padding-bottom: 15px; 
            font-size: 1.8rem;
            font-weight: 600;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        .form-group input { 
            width: 95%; 
            padding: 10px; 
            border: 1px solid #d1d5db; 
            border-radius: 6px;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            border-color: var(--primary); /* Foco visual */
            outline: none;
        }
        /* Botão Principal de Atualização (Azul) */
        .btn-update { 
            padding: 10px 20px; 
            background-color: var(--primary); 
            color: white; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-update:hover { background-color: #3b82f6; }

        /* Link Voltar (Secundário) */
        .link-back { 
            display: inline-block; 
            margin-top: 10px; 
            text-decoration: none; 
            color: #6b7280;
            padding: 10px 0;
            margin-left: 20px;
        }
        /* Estilo para erros (Melhorado visualmente) */
        .alert-danger { 
            padding: 15px; 
            background-color: #fee2e2; 
            color: #b91c1c; 
            border: 1px solid #fca5a5; 
            border-radius: 6px; 
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <div class="container-box">
        <h1>Editar Aluno: {{ $aluno->nome }}</h1>

        @if ($errors->any())
            <div class="alert-danger">
                <strong>Opa!</strong> Verifique os campos:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
            @csrf 
            @method('PUT') 

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $aluno->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $aluno->email) }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $aluno->telefone) }}">
            </div>

            <div style="margin-top: 30px;">
                <button type="submit" class="btn-update">Atualizar Aluno</button>
                <a href="{{ route('alunos.index') }}" class="link-back">Voltar para a Lista</a>
            </div>
        </form>
    </div>
</body>
</html>