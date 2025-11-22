<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos - Design Único</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variáveis de Dark Mode (NÃO ALTERADAS) */
        :root {
            --bg-page: #1f2937; /* Fundo Escuro */
            --bg-card: #374151; /* Janela Central Escura */
            --text-light: #f3f4f6;
            --accent-primary: #f59e0b; /* AMARELO DOURADO (ADICIONAR) */
            --accent-secondary: #2dd4bf; /* CIANO/MINT (VER/EDITAR) */
            --accent-danger: #dc2626; /* Vermelho (Excluir) */
            --shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            --font-display: 'Roboto', sans-serif; 
        }
        
        body { 
            font-family: var(--font-display); 
            margin: 0; 
            background-color: var(--bg-page); 
            padding: 40px;
            color: var(--text-light);
            line-height: 1.6;
        }
        .container-box { 
            max-width: 1000px; 
            margin: auto;
            background: var(--bg-card); 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: var(--shadow); 
            width: 100%;
            margin-bottom: 30px; /* Espaço antes do footer */
        }
        h1 { 
            color: var(--text-light); 
            font-size: 2.2rem; 
            margin-bottom: 25px; 
            border-bottom: 2px solid #4b5563;
            padding-bottom: 10px;
            font-weight: 700;
        }
        
        /* Navegação */
        .nav-link { text-decoration: none; color: #9ca3af; font-weight: bold; margin-right: 20px; }
        .nav-link.active { color: var(--accent-primary); border-bottom: 3px solid var(--accent-primary); padding-bottom: 10px; }
        
        /* Estilo dos Cards */
        .alunos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
            gap: 20px;
            margin-top: 20px;
        }
        .aluno-card {
            background-color: #4b5563; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border-left: 5px solid var(--accent-primary); 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 180px;
            transition: transform 0.2s;
        }
        .aluno-card:hover { transform: translateY(-3px); }

        .aluno-nome { font-size: 1.4rem; font-weight: 700; color: var(--text-light); margin-bottom: 5px; }
        .aluno-email { color: #9ca3af; font-size: 0.95rem; margin-bottom: 15px; }
        
        /* Botões */
        .card-actions { display: flex; gap: 5px; margin-top: 10px; }
        .btn-action { 
            padding: 7px 10px; border-radius: 6px; font-size: 0.8rem; text-decoration: none; font-weight: bold; border: none;
            transition: all 0.2s ease;
        }
        .btn-action:hover { opacity: 0.85; transform: translateY(-1px); }
        .btn-create { background-color: var(--accent-primary); color: var(--bg-card); }
        .btn-info { background-color: var(--accent-secondary); color: var(--bg-card); }
        .btn-primary { background-color: #3b82f6; color: white; }
        .btn-danger { background-color: var(--accent-danger); color: white; }

        /* Estilo Alerta */
        .alert-fixed { 
            position: fixed; top: 10px; right: 10px; z-index: 1000; padding: 10px 15px; border-radius: 6px; box-shadow: var(--shadow); font-weight: bold;
        }
        .alert-success { background-color: #10b981; color: white; }
        .alert-danger { background-color: var(--accent-danger); color: white; }
        
        /* NOVO: Estilo para Rodapé Padrão */
        .footer-academico-standard {
            width: 100%;
            background-color: #27303d; /* Um pouco mais escuro que o fundo */
            color: #9ca3af;
            padding: 20px 0;
            font-size: 0.85rem;
            text-align: center;
            border-top: 1px solid #4b5563;
        }
        .footer-academico-standard p { margin: 5px 0; line-height: 1.4; }
        .footer-academico-standard strong { color: var(--accent-secondary); }
        .footer-academico-standard .laravel-logo, .footer-academico-standard .csi-logo {
            height: 18px; vertical-align: middle; margin-left: 10px;
        }
        .footer-academico-standard .laravel-logo { filter: invert(100%); }
    </style>
</head>
<body>
    
    {{-- Alertas de Sessão --}}
    @if(session('success'))
        <div class="alert-fixed alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert-fixed alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="container-box">
        
        {{-- Navegação Primária: Apenas Dashboard --}}
        <div style="margin-bottom: 20px; padding-bottom: 10px;">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-arrow-left"></i> VOLTAR AO DASHBOARD</a>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h1>GESTÃO DE ALUNOS</h1>
            <a href="{{ route('alunos.create') }}" class="btn-action btn-create"><i class="fas fa-plus me-2"></i> NOVO ALUNO</a>
        </div>

        @isset($alunos)
            @if ($alunos->isEmpty())
                <p style="text-align: center; color: #9ca3af; margin-top: 50px;">Nenhum aluno encontrado.</p>
            @else
                <div class="alunos-grid">
                    
                    {{-- Loop para exibir os Cards --}}
                    @foreach ($alunos as $aluno)
                        <div class="aluno-card">
                            <div>
                                <div class="aluno-nome">{{ $aluno->nome }}</div>
                                <div class="aluno-email"><i class="fas fa-envelope"></i> {{ $aluno->email }}</div>
                                @if ($aluno->telefone)
                                    <div class="aluno-telefone" style="color: #9ca3af; font-size: 0.95rem;">
                                        <i class="fas fa-phone"></i> {{ $aluno->telefone }}
                                    </div>
                                @endif
                            </div>

                            <div class="card-actions">
                                {{-- Botões CRUD --}}
                                <a href="{{ route('alunos.show', $aluno->id) }}" class="btn-action btn-info"><i class="fas fa-eye"></i> Ver</a>
                                <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn-action btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                
                                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display: inline-block; margin-left: auto;" onsubmit="return confirmDelete(event, '{{ $aluno->nome }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                </div>
            @endif
        @endisset
    </div>

    <!-- NOVO: Rodapé Acadêmico Padrão -->
    <footer class="footer-academico-standard">
        <p>Desenvolvido por: <strong>Leandro Vasconcelos</strong> e <strong>Cristina Amaral</strong></p>
        <p>Disciplina: Programação Orientada á Objeto | Profª: Luciene Soares</p>
        <p>Curso Técnico de Informática | Colégio Santo Inácio | Rede Jesuíta de Educação
            <img src="{{ asset('imagens/csi.png') }}" alt="Colégio Santo Inácio" class="csi-logo">
        </p>
        <p>Projeto Acadêmico | Sistema de Aulas Particulares | MVC Laravel 
            <img src="{{ asset('imagens/laravel.png') }}" alt="Laravel Framework" class="laravel-logo">
        </p>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(event, nomeAluno) {
            if (!window.confirm('Tem certeza que deseja excluir o aluno: "' + nomeAluno + '"? Esta ação é irreversível e pode afetar aulas relacionadas.')) {
                event.preventDefault();
                return false;
            }
            return true;
        }
        
        document.addEventListener('DOMContentLoaded', (event) => {
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