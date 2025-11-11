<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aulas Agendadas | Aulas Particulares</title>
    <!-- Estilo CSS autônomo -->
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 1200px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        
        .btn-add { display: inline-block; padding: 8px 12px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 20px; }
        .btn-action { margin-right: 5px; text-decoration: none; padding: 5px 8px; border-radius: 3px; font-size: 0.9em; border: 1px solid transparent; }
        .btn-view { background-color: #17a2b8; color: white; }
        .btn-edit { background-color: #ffc107; color: #333; }
        .btn-delete { background-color: #dc3545; color: white; border: none; cursor: pointer; }
        
        .alert-success { padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 15px; }

        /* Estilo para links rápidos de navegação */
        .nav-links { margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;}
        .nav-links a { margin-right: 15px; text-decoration: none; color: #007bff; }
        .nav-links a.active { font-weight: bold; color: #007bff; }
    </style>
    <script>
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
        
        <!-- INÍCIO DA NAVEGAÇÃO GLOBAL -->
        <div class="nav-links">
            <a href="{{ route('alunos.index') }}">ALUNOS</a>
            <a href="{{ route('disciplinas.index') }}">DISCIPLINAS</a>
            <a href="{{ route('aulas.index') }}" class="active">AULAS</a>
        </div>
        <!-- FIM DA NAVEGAÇÃO GLOBAL -->
        
        <h1>Aulas Agendadas</h1>

        <a href="{{ route('aulas.create') }}" class="btn-add">Agendar Nova Aula</a>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($aulas->isEmpty())
            <p>Nenhuma aula agendada encontrada.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aluno</th>
                        <th>Disciplina</th>
                        <th>Data</th>
                        <th>Duração (h)</th>
                        <th>Valor Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aulas as $aula)
                        <tr>
                            <td>{{ $aula->id }}</td>
                            <td>{{ $aula->aluno->nome }}</td>
                            <td>{{ $aula->disciplina->nome }}</td>
                            
                            <td class="data-raw" data-data="{{ $aula->data }}">
                                {{ $aula->data }} 
                            </td>
                            <td class="duracao-raw">{{ $aula->duracao_horas }}</td>
                            
                            <td class="valor-total-raw" data-valor="{{ $aula->valor_total }}">
                                {{ $aula->valor_total }}
                            </td>
                            <td>
                                <a href="{{ route('aulas.show', $aula->id) }}" class="btn-action btn-view">Ver</a>
                                <a href="{{ route('aulas.edit', $aula->id) }}" class="btn-action btn-edit">Editar</a>
                                
                                <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta aula?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Script para formatar valor e data após o carregamento -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Formata o valor total
            document.querySelectorAll('.valor-total-raw').forEach(function(element) {
                const valor = element.getAttribute('data-valor');
                element.textContent = formatarMoeda(valor);
            });

            // Formata a data (simplificado, já que a migration usa 'date', não timestamp)
            document.querySelectorAll('.data-raw').forEach(function(element) {
                const data = new Date(element.getAttribute('data-data'));
                element.textContent = data.toLocaleDateString('pt-BR');
            });

            // Adiciona 'h' nas horas para melhor leitura
             document.querySelectorAll('.duracao-raw').forEach(function(element) {
                element.textContent += 'h';
            });
        });
    </script>
</body>
</html>