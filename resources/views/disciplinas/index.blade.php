<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Disciplinas - Cards</title>

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
            margin-bottom: 30px;
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
        
        /* Estilo dos Cards */
        .disciplinas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .disciplina-card {
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
        .disciplina-card:hover { transform: translateY(-3px); }

        .disciplina-nome { font-size: 1.4rem; font-weight: 700; color: var(--text-light); margin-bottom: 5px; }
        .disciplina-info { color: #9ca3af; font-size: 0.95rem; margin-bottom: 5px; }
        
        /* Botões */
        .card-actions { display: flex; gap: 5px; margin-top: 15px; }
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
            background-color: #27303d; 
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
            <h1>GESTÃO DE DISCIPLINAS</h1>
            <a href="{{ route('disciplinas.create') }}" class="btn-action btn-create"><i class="fas fa-book me-2"></i> NOVA DISCIPLINA</a>
        </div>

        @isset($disciplinas)
            @if ($disciplinas->isEmpty())
                <p style="text-align: center; color: #9ca3af; margin-top: 50px;">Nenhuma disciplina encontrada.</p>
            @else
                <div class="disciplinas-grid">
                    
                    {{-- Loop para exibir os Cards --}}
                    @foreach ($disciplinas as $disciplina)
                        <div class="disciplina-card">
                            <div>
                                <div class="disciplina-nome">{{ $disciplina->nome }}</div>
                                <div class="disciplina-info"><i class="fas fa-hourglass-half"></i> Carga Horária: {{ $disciplina->carga_horaria ?? 'N/A' }} horas</div>
                                <div class="disciplina-info valor-hora-raw" data-valor="{{ $disciplina->valor_hora }}"><i class="fas fa-money-bill-wave"></i> Valor/Hora: R$ {{ $disciplina->valor_hora }}</div>
                            </div>

                            <div class="card-actions">
                                {{-- Botões CRUD --}}
                                <a href="{{ route('disciplinas.show', $disciplina->id) }}" class="btn-action btn-info"><i class="fas fa-eye"></i> Ver</a>
                                <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="btn-action btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                
                                <form action="{{ route('disciplinas.destroy', $disciplina->id) }}" method="POST" style="display: inline-block; margin-left: auto;" onsubmit="return confirmDelete(event, '{{ $disciplina->nome }}')">
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
        function confirmDelete(event, nomeDisciplina) {
            if (!window.confirm('Tem certeza que deseja excluir a disciplina: "' + nomeDisciplina + '"? Esta ação é irreversível e pode afetar aulas relacionadas.')) {
                event.preventDefault();
                return false;
            }
            return true;
        }

        function formatarMoeda(valor) {
            return parseFloat(valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }
        
        document.addEventListener('DOMContentLoaded', (event) => {
            // Formata o valor da hora após o carregamento
            document.querySelectorAll('.valor-hora-raw').forEach(function(element) {
                const valor = element.getAttribute('data-valor');
                element.innerHTML = '<i class="fas fa-money-bill-wave"></i> Valor/Hora: ' + formatarMoeda(valor);
            });
        });
    </script>
</body>
</html>