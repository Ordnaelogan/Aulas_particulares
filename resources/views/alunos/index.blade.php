<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos | Aulas Particulares</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
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
    <!-- Incluindo JavaScript para a confirmação de exclusão -->
    <script>
        function confirmarExclusao(event) {
            // Em ambientes de produção/provas, o 'confirm' é muitas vezes evitado.
            // Aqui, usamos um alerta simples para simular a confirmação.
            alert("AVISO: A exclusão do aluno é permanente. (Ação Simples para Prova)");
            return true; // Continua com a exclusão após o aviso
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Lista de Alunos</h1>

        <a href="{{ route('alunos.create') }}" class="btn-add">Adicionar Novo Aluno</a>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($alunos->isEmpty())
            <p>Nenhum aluno encontrado. O banco de dados está vazio.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->id }}</td>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->email }}</td>
                            <td>{{ $aluno->telefone }}</td>
                            <td>
                                <a href="{{ route('alunos.show', $aluno->id) }}" class="btn-action btn-view">Ver</a>
                                <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn-action btn-edit">Editar</a>
                                
                                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;" onsubmit="return confirmarExclusao(event)">
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
</body>
</html>