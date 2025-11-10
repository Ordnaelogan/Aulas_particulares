<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Disciplina</title>
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
    <script>
        // Função para formatar o valor como moeda
        function formatarMoeda(valor) {
            return parseFloat(valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Detalhes da Disciplina: {{ $disciplina->nome }}</h1>

        <div class="detail-group">
            <strong>Nome da Disciplina:</strong>
            <span>{{ $disciplina->nome }}</span>
        </div>

        <div class="detail-group">
            <strong>Carga Horária:</strong>
            <span>{{ $disciplina->carga_horaria }} horas</span>
        </div>

        <div class="detail-group">
            <strong>Valor por Hora:</strong>
            <!-- Usa a função JS para formatar -->
            <span id="valor-hora">{{ $disciplina->valor_hora }}</span>
        </div>
        
        <hr style="border: 0; border-top: 1px solid #eee; margin-top: 20px;">

        <a href="{{ route('disciplinas.index') }}" class="link-back">Voltar para a Lista</a>
    </div>

    <!-- Script para formatar o valor após o carregamento -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const valorElement = document.getElementById('valor-hora');
            valorElement.textContent = formatarMoeda(valorElement.textContent);
        });
    </script>
</body>
</html>