<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Disciplinas | Aulas Particulares</title>
    <!-- Estilo CSS autônomo -->
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
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
    </style>
    <script>
        function formatarMoeda(valor) {
            return parseFloat(valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Lista de Disciplinas</h1>

        <!-- Link para o formulário de cadastro -->
        <a href="{{ route('disciplinas.create') }}" class="btn-add">Adicionar Nova Disciplina</a>
        <a href="{{ route('alunos.index') }}" style="margin-left: 10px; text-decoration: none; color: #007bff;">Voltar para Alunos</a>


        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($disciplinas->isEmpty())
            <p>Nenhuma disciplina encontrada. O banco de dados está vazio.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Carga Horária (h)</th>
                        <th>Valor/Hora</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disciplinas as $disciplina)
                        <tr>
                            <td>{{ $disciplina->id }}</td>
                            <td>{{ $disciplina->nome }}</td>
                            <td>{{ $disciplina->carga_horaria }}</td>
                            <!-- Usa JavaScript para formatar o valor como moeda -->
                            <td class="valor-hora-raw" data-valor="{{ $disciplina->valor_hora }}">
                                {{ $disciplina->valor_hora }}
                            </td>
                            <td>
                                <!-- Ações (ainda não funcionam, mas os links estão prontos) -->
                                <a href="{{ route('disciplinas.show', $disciplina->id) }}" class="btn-action btn-view">Ver</a>
                                <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="btn-action btn-edit">Editar</a>
                                
                                <form action="{{ route('disciplinas.destroy', $disciplina->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta disciplina? Isso pode afetar Aulas relacionadas!')">
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

    <!-- Script para formatar o valor da hora após o carregamento -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.valor-hora-raw').forEach(function(element) {
                const valor = element.getAttribute('data-valor');
                element.textContent = formatarMoeda(valor);
            });
        });
    </script>
</body>
</html>