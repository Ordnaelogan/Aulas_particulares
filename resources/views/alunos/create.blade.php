<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Aluno</title>
    <style>
        /* Estilo da Janela Central (Cara de Software) */
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: #f4f4f4; /* Fundo cinza claro (limpo) */
            display: flex; /* Centraliza a caixa na tela */
            justify-content: center; 
            align-items: center; 
            min-height: 100vh;
        }
        .container-box { 
            max-width: 500px; 
            background: white; 
            padding: 30px; 
            border-radius: 12px; /* Bordas suaves */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* Sombra suave */
            width: 90%;
        }
        h1 { 
            color: #333; 
            border-bottom: 1px solid #eee; /* Linha de separação discreta */
            padding-bottom: 15px; 
            font-size: 1.5rem;
        }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; }
        .form-group input { width: 95%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; }
        /* Botão Salvar (Verde) */
        .btn-submit { 
            padding: 10px 15px; 
            background-color: #28a745; /* Verde Bootstrap */
            color: white; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer;
            font-weight: bold;
        }
        .link-back { 
            display: inline-block; 
            margin-left: 20px; 
            text-decoration: none; 
            color: #6c757d; /* Cinza suave */
        }
        .link-back:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container-box">
        <h1>Adicionar Novo Aluno</h1>

        @if ($errors->any())
            <div style="padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 15px;">
                <strong>Opa!</strong> Algo deu errado:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('alunos.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="{{ old('telefone') }}">
            </div>

            <div>
                <button type="submit" class="btn-submit">Salvar Aluno</button>
                <a href="{{ route('alunos.index') }}" class="link-back">Voltar para a Lista</a>
            </div>
        </form>
    </div>
</body>
</html>