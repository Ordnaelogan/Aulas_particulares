<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
    <!-- Estilo CSS autônomo -->
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .detail-group { margin-bottom: 15px; }
        .detail-group strong { display: block; color: #555; font-size: 0.9em; text-transform: uppercase; }
        .detail-group span { font-size: 1.2em; color: #000; }
        .link-back { display: inline-block; margin-top: 20px; text-decoration: none; color: #007bff; padding: 8px 12px; border: 1px solid #007bff; border-radius: 4px; }
        .link-back:hover { background-color: #007bff; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <!-- O $aluno->nome vem do compact('aluno') que fizemos no Controller -->
        <h1>Detalhes do Aluno</h1>

        <div class="detail-group">
            <strong>Nome:</strong>
            <span>{{ $aluno->nome }}</span>
        </div>

        <div class="detail-group">
            <strong>Email:</strong>
            <span>{{ $aluno->email }}</span>
        </div>

        <div class="detail-group">
            <strong>Telefone:</strong>
            <!-- Se o telefone estiver vazio, mostra "Não cadastrado" -->
            <span>{{ $aluno->telefone ?? 'Não cadastrado' }}</span>
        </div>
        
        <hr style="border: 0; border-top: 1px solid #eee; margin-top: 20px;">

        <div class="detail-group">
            <strong>Criado em:</strong>
            <span>{{ $aluno->created_at->format('d/m/Y \à\s H:i') }}</span>
        </div>

        <div class="detail-group">
            <strong>Última Atualização:</strong>
            <span>{{ $aluno->updated_at->format('d/m/Y \à\s H:i') }}</span>
        </div>


        <a href="{{ route('alunos.index') }}" class="link-back">Voltar para a Lista</a>
    </div>
</body>
</html>