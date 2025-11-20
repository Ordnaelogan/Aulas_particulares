<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <style>
        :root {
            --primary: #1e3a8a; 
            --success: #059669; /* Botão Adicionar */
            --danger: #dc3545; /* Botão Excluir */
            --info: #0dcaf0; /* Botão Ver */
            --background-color: #f0f4f8;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: var(--background-color); 
            padding: 40px;
        }
        .container-box { 
            max-width: 900px; /* Mais largo para a tabela */
            margin: auto;
            background: white; 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: var(--shadow); 
            width: 100%;
        }
        h1 { 
            color: #333; 
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        /* Estilo da Tabela */
        .table-custom {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table-custom th, .table-custom td {
            padding: 12px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
        }
        .table-custom th {
            background-color: #f8f8f8;
            font-weight: 600;
            color: #555;
        }
        /* Botões de Ação na Lista */
        .btn-action {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9rem;
            text-decoration: none;
            margin-left: 5px;
        }
        .btn-success { background-color: var(--success); color: white; border: none; }
        .btn-info { background-color: var(--info); color: white; border: none; }
        .btn-primary { background-color: var(--primary); color: white; border: none; }
        .btn-danger { background-color: var(--danger); color: white; border: none; }
    </style>
</head>
<body>
    <div class="container-box">
        
        <div style="margin-bottom: 20px; border-bottom: 2px solid #ddd; padding-bottom: 10px;">
            <a href="#" style="text-decoration: none; color: var(--primary); font-weight: bold; margin-right: 15px; border-bottom: 3px solid var(--primary);">Alunos</a>
            <a href="#" style="text-decoration: none; color: #666; margin-right: 15px;">Disciplinas</a>
            <a href="#" style="text-decoration: none; color: #666;">Aulas</a>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h1>LISTA DE ALUNOS</h1>
            <a href="{{ route('alunos.create') }}" class="btn-action btn-success">ADICIONAR NOVO ALUNO</a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>Email</th>
                        <th style="width: 20%; text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Exemplo de Aluno (Aqui entraria seu loop @foreach) --}}
                    <tr>
                        <td>Leandro Silva</td>
                        <td>leandro.s@email.com</td>
                        <td style="text-align: center;">
                            <a href="{{ route('alunos.show', 1) }}" class="btn-action btn-info">Ver</a>
                            <a href="{{ route('alunos.edit', 1) }}" class="btn-action btn-primary">Editar</a>
                            
                            <form action="{{ route('alunos.destroy', 1) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    {{-- Fim do Exemplo --}}
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>