<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <!-- Estilo CSS autônomo -->
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 95%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-submit { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .link-back { display: block; margin-top: 20px; text-decoration: none; color: #007bff; }
        /* Estilo para erros de validação */
        .alert-danger { padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 15px; }
        .alert-danger ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Aluno: {{ $aluno->nome }}</h1>

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

        <!-- 
        MUDANÇA IMPORTANTE: 
        O formulário aponta para 'alunos.update' e usa o método 'PUT' 
        -->
        <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
            @csrf <!-- Token de segurança OBRIGATÓRIO -->
            @method('PUT') <!-- Método HTTP para ATUALIZAÇÃO -->

            <div class="form-group">
                <label for="nome">Nome:</label>
                <!-- O 'value' preenche o campo com o dado atual ou o 'old' se a validação falhar -->
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

            <button type="submit" class="btn-submit">Atualizar Aluno</button>
        </form>

        <a href="{{ route('alunos.index') }}" class="link-back">Voltar para a Lista</a>
    </div>
</body>
</html>