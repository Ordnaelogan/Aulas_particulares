<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos - Dark Mode Dourado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --bg-page: #1f2937; /* Fundo Escuro */
            --bg-card: #374151; /* Janela Central Escura */
            --text-light: #f3f4f6;
            --accent-primary: #f59e0b; /* AMARELO DOURADO */
            --accent-secondary: #facc15; /* Amarelo Secundário (VER/EDITAR) */
            --accent-danger: #dc2626; /* Vermelho (Excluir) */
            --shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
        }
        
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: var(--bg-page); 
            padding: 40px;
            color: var(--text-light);
        }
        .container-box { 
            max-width: 950px; 
            margin: auto;
            background: var(--bg-card); 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: var(--shadow); 
            width: 100%;
        }
        h1 { color: var(--text-light); font-size: 1.8rem; margin-bottom: 20px; }
        
        /* Tabela */
        .table-custom { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table-custom th, .table-custom td { padding: 12px; border-bottom: 1px solid #4b5563; text-align: left; }
        .table-custom th { background-color: var(--bg-card); font-weight: 600; color: var(--accent-primary); }
        .table-custom td { color: var(--text-light); }
        
        /* Navegação */
        .nav-link { text-decoration: none; color: #9ca3af; font-weight: bold; margin-right: 20px; }
        .nav-link.active { color: var(--accent-primary); border-bottom: 3px solid var(--accent-primary); padding-bottom: 10px; }
        
        /* Botões */
        .btn-action { padding: 7px 12px; border-radius: 6px; font-size: 0.85rem; text-decoration: none; margin-left: 5px; font-weight: bold; border: none; }
        .btn-create { background-color: var(--accent-primary); color: var(--bg-card); } 
        .btn-info, .btn-primary { background-color: var(--accent-secondary); color: var(--bg-card); } 
        .btn-danger { background-color: var(--accent-danger); color: white; }
    </style>
</head>
<body>
    <div class="container-box">
        
        <div style="margin-bottom: 20px; padding-bottom: 10px;">
            <a href="#" class="nav-link active">Alunos</a>
            <a href="#" class="nav-link">Disciplinas</a>
            <a href="#" class="nav-link">Aulas</a>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h1>LISTA DE ALUNOS</h1>
            <a href="{{ route('alunos.create') }}" class="btn-action btn-create"><i class="fas fa-plus me-2"></i> ADICIONAR NOVO ALUNO</a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>Email</th>
                        <th style="width: 25%; text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($alunos)
                        @foreach ($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->email }}</td>
                            <td style="text-align: center;">
                                <a href="{{ route('alunos.show', $aluno->id) }}" class="btn-action btn-info"><i class="fas fa-eye"></i> Ver</a>
                                <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn-action btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-danger" onclick="return confirm('Excluir?');"><i class="fas fa-trash-alt"></i> Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr><td colspan="3" style="text-align: center; color: #9ca3af;">Nenhum aluno encontrado.</td></tr>
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>