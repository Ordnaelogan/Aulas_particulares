<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Aula</title>
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
        function formatarData(data) {
            const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            return new Date(data).toLocaleDateString('pt-BR', options);
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Detalhes da Aula</h1>

        <div class="detail-group">
            <strong>Aluno:</strong>
            <!-- Usa o relacionamento para obter o nome do aluno -->
            <span>{{ $aula->aluno->nome }} ({{ $aula->aluno->email }})</span>
        </div>

        <div class="detail-group">
            <strong>Disciplina:</strong>
            <!-- Usa o relacionamento para obter o nome da disciplina -->
            <span>{{ $aula->disciplina->nome }}</span>
        </div>

        <div class="detail-group">
            <strong>Data da Aula:</strong>
            <span id="data-aula">{{ $aula->data }}</span>
        </div>
        
        <div class="detail-group">
            <strong>Duração:</strong>
            <span>{{ $aula->duracao_horas }} horas</span>
        </div>

        <div class="detail-group">
            <strong>Valor por Hora da Disciplina:</strong>
            <span id="valor-hora">{{ $aula->disciplina->valor_hora }}</span>
        </div>
        
        <div class="detail-group">
            <strong>Valor Total da Aula:</strong>
            <span id="valor-total">{{ $aula->valor_total }}</span>
        </div>

        <hr style="border: 0; border-top: 1px solid #eee; margin-top: 20px;">

        <a href="{{ route('aulas.index') }}" class="link-back">Voltar para a Lista de Aulas</a>
    </div>

    <!-- Script para formatar valor e data após o carregamento -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Formata o Valor por Hora e Valor Total
            const formatar = (id) => {
                const element = document.getElementById(id);
                if (element) {
                    element.textContent = formatarMoeda(element.textContent);
                }
            };
            formatar('valor-hora');
            formatar('valor-total');
            
            // Formata a Data
            const dataElement = document.getElementById('data-aula');
            if (dataElement) {
                dataElement.textContent = formatarData(dataElement.textContent);
            }
        });
    </script>
</body>
</html>