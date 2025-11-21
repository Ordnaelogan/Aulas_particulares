<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aulas Agendadas - Dark Mode Final</title>

    <!-- CDNs (Fontes e Ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variáveis de Dark Mode (Consistente com as outras Views) */
        :root {
            --bg-page: #1f2937; /* Fundo Escuro */
            --bg-card: #374151; /* Janela Central Escura */
            --text-light: #f3f4f6;
            --accent-primary: #f59e0b; /* AMARELO DOURADO (ADICIONAR) */
            --accent-secondary: #2dd4bf; /* CIANO/MINT (VER/EDITAR) */
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
            max-width: 1200px; /* Maior para caber mais colunas */
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
        .table-custom tr:hover td { background-color: #4b556333; }

        /* CORREÇÃO APLICADA: Garante que o conteúdo da célula de ações não quebre a linha */
        .table-custom .td-actions {
            white-space: nowrap;
            width: 200px; /* Ajuda a garantir espaço na coluna */
        }

        /* Navegação */
        .nav-link { text-decoration: none; color: #9ca3af; font-weight: bold; margin-right: 20px; }
        .nav-link.active { color: var(--accent-primary); border-bottom: 3px solid var(--accent-primary); padding-bottom: 10px; }
        
        /* Botões */
        .btn-action { 
            padding: 7px 12px; 
            border-radius: 6px; 
            font-size: 0.85rem; 
            text-decoration: none; 
            margin-left: 5px; 
            font-weight: bold; 
            border: none;
            transition: all 0.2s ease;
        }
        .btn-action:hover {
            opacity: 0.85; 
            transform: translateY(-1px); 
        }
        .btn-create { background-color: var(--accent-primary); color: var(--bg-card); } /* Dourado */
        .btn-view { background-color: var(--accent-secondary); color: var(--bg-card); } /* Ciano/Mint */
        .btn-edit { background-color: #3b82f6; color: white; } /* Azul */
        .btn-delete { background-color: var(--accent-danger); color: white; } /* Vermelho */

        /* Alerta de Sessão */
        .alert-success, .alert-danger { 
            position: fixed; 
            top: 10px; 
            right: 10px; 
            z-index: 1000;
            padding: 10px 15px;
            border-radius: 6px;
            box-shadow: var(--shadow);
            font-weight: bold;
        }
        .alert-success { background-color: #10b981; color: white; }
        .alert-danger { background-color: var(--accent-danger); color: white; }
    </style>
    
</head>
<body>
    
    <!-- Alertas de Sessão -->
    @if (session('success'))
        <div class="alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-box">
        
        <!-- Navegação Primária -->
        <div style="margin-bottom: 20px; padding-bottom: 10px;">
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            <a href="{{ route('alunos.index') }}" class="nav-link">Alunos</a>
            <a href="{{ route('disciplinas.index') }}" class="nav-link">Disciplinas</a>
            <a href="{{ route('aulas.index') }}" class="nav-link active">Aulas</a>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h1>AULAS AGENDADAS</h1>
            <a href="{{ route('aulas.create') }}" class="btn-action btn-create"><i class="fas fa-plus me-2"></i> AGENDAR NOVA AULA</a>
        </div>

        @if($aulas->isEmpty())
            <p style="text-align: center; color: #9ca3af;">Nenhuma aula agendada encontrada.</p>
        @else
            <div class="table-responsive">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aluno</th>
                            <th>Disciplina</th>
                            <th>Data</th>
                            <th>Duração (h)</th>
                            <th>Valor Total</th>
                            <th style="width: 15%; text-align: center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aulas as $aula)
                            <tr>
                                <td>{{ $aula->id }}</td>
                                <!-- Acesso aos Relacionamentos (Aluno e Disciplina) - Correto devido ao eager loading no Controller -->
                                <td>{{ $aula->aluno->nome }}</td> 
                                <td>{{ $aula->disciplina->nome }}</td>
                                
                                <td class="data-raw" data-data="{{ $aula->data }}">
                                    <!-- O conteúdo aqui será substituído por JS com a data formatada -->
                                </td>
                                <td class="duracao-raw">{{ $aula->duracao_horas }}</td>
                                
                                <td class="valor-total-raw" data-valor="{{ $aula->valor_total }}">
                                    <!-- O conteúdo aqui será substituído por JS com a moeda formatada -->
                                </td>
                                
                                <!-- APLICAÇÃO DA CLASSE DE CORREÇÃO -->
                                <td style="text-align: center;" class="td-actions">
                                    <a href="{{ route('aulas.show', $aula->id) }}" class="btn-action btn-view"><i class="fas fa-eye"></i> Ver</a>
                                    <a href="{{ route('aulas.edit', $aula->id) }}" class="btn-action btn-edit"><i class="fas fa-edit"></i> Editar</a>
                                    
                                    <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete"><i class="fas fa-trash-alt"></i> Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Função utilitária para formatação de moeda
        function formatarMoeda(valor) {
             return parseFloat(valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }
        
        // Função de confirmação de exclusão
        function confirmDelete(event) {
            if (!window.confirm('Tem certeza que deseja excluir esta aula?')) {
                event.preventDefault();
                return false;
            }
            return true;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // 1. Formata o valor total
            document.querySelectorAll('.valor-total-raw').forEach(function(element) {
                const valor = element.getAttribute('data-valor');
                element.textContent = formatarMoeda(valor);
            });

            // 2. Formata a data (DD/MM/AAAA)
            document.querySelectorAll('.data-raw').forEach(function(element) {
                const data = new Date(element.getAttribute('data-data'));
                // Garante que a data está correta antes de formatar
                if (!isNaN(data)) {
                    element.textContent = data.toLocaleDateString('pt-BR', { year: 'numeric', month: '2-digit', day: '2-digit' });
                } else {
                    element.textContent = 'Data Inválida';
                }
            });

            // 3. Adiciona 'h' à duração (ex: 1.5 -> 1.5h)
            document.querySelectorAll('.duracao-raw').forEach(function(element) {
                element.textContent += 'h';
            });
            
            // 4. Esconde alertas após 4 segundos
            const successAlert = document.querySelector('.alert-success');
            const errorAlert = document.querySelector('.alert-danger');

            if (successAlert) {
                setTimeout(() => { successAlert.remove(); }, 4000);
            }
            if (errorAlert) {
                setTimeout(() => { errorAlert.remove(); }, 4000);
            }
        });
    </script>
</body>
</html>