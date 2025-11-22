{{-- resources/views/layouts/original.blade.php - CÓDIGO CORRIGIDO COM TRANSPARÊNCIA CONDICIONAL --}}

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aulas Particulares - Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variáveis de Estilo Customizado (Seu Tema Dark Mode) */
        :root {
            --bg-page: #1f2937; 
            --bg-card: #374151; /* Janela Central Escura */
            --text-light: #f3f4f6;
            --accent-primary: #f59e0b; /* AMARELO DOURADO */
            --accent-secondary: #2dd4bf; 
            --accent-danger: #dc2626; 
            --shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
        }
        
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: var(--bg-page); 
            padding: 0; 
            color: var(--text-light);
            position: relative; 
            min-height: 100vh;
        }
        /* Fundo com Imagem Desfocada */
        .custom-bg-image {
            background-image: url("{{ asset('imagens/2025.png') }}");
            background-size: cover;
            background-position: center;
            filter: blur(5px); 
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -2; 
        }
        /* ATENÇÃO: Remoção do background fixo da classe container-box no CSS */
        .container-box { 
            max-width: 950px; 
            margin: auto;
            /* background: var(--bg-card); <--- REMOVIDO AQUI! */
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: var(--shadow); 
            width: 100%;
        }
        .nav-link { text-decoration: none; color: #9ca3af; font-weight: bold; margin-right: 20px; }
        .nav-link.active { color: var(--accent-primary); border-bottom: 3px solid var(--accent-primary); padding-bottom: 10px; }
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
        .btn-action:hover { opacity: 0.85; transform: translateY(-1px); }
        .btn-create { background-color: var(--accent-primary); color: var(--bg-card); } 
        .btn-danger { background-color: var(--accent-danger); color: white; }

        /* Estilo do Rodapé Fixo */
        .app-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            color: white;
            padding: 10px 40px; 
            z-index: 10;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .app-footer img {
            height: 80px; /* Seu ajuste de 80px */
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="custom-bg-image"></div> 
    <div style="padding: 40px 0; padding-bottom: 80px;"> 
        
        @if (Auth::check())
        @php
            // Usa o helper global \Request para verificar a rota e aplicar o estilo.
            $is_dashboard = \Request::routeIs('dashboard');
            // Dashboard (transparente): var(--bg-card) com 70% de transparência
            // Outras páginas (CRUD): var(--bg-card) opaco
            $box_style = $is_dashboard ? 'background: rgba(55, 65, 81, 0.7);' : 'background: var(--bg-card);';
        @endphp

        <div class="container-box" style="{{ $box_style }}"> 
            
            {{-- Navegação Principal com Links e Logout (Sempre incluída) --}}
            <div style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #4b5563;" class="clearfix">
                <a href="{{ route('dashboard') }}" class="nav-link @if($is_dashboard) active @endif" style="float: left;">Dashboard</a>
                <a href="{{ route('alunos.index') }}" class="nav-link @if(\Request::routeIs('alunos.*')) active @endif" style="float: left;">Alunos</a>
                <a href="{{ route('disciplinas.index') }}" class="nav-link @if(\Request::routeIs('disciplinas.*')) active @endif" style="float: left;">Disciplinas</a>
                <a href="{{ route('aulas.index') }}" class="nav-link @if(\Request::routeIs('aulas.*')) active @endif" style="float: left;">Aulas</a>
                
                {{-- Logout do Breeze Adaptado --}}
                <form method="POST" action="{{ route('logout') }}" style="display: inline; float: right;">
                    @csrf
                    <button type="submit" class="btn-action btn-danger">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </button>
                </form>
            </div>
            
            @yield('content') 

        </div>
        @else
            @yield('content')
        @endif
    </div>

    <footer class="app-footer">
        <div style="display: flex; align-items: center;">
            <img src="{{ asset('imagens/logo2.png') }}" alt="Logo">
            <div>
                <div style="font-weight: bold;">Software Aulas Particulares</div>
                <div style="font-size: 0.8rem;">Gerencie seu conhecimento.</div>
            </div>
        </div>
        <div style="font-size: 0.8rem;">
            Software Aulas Particulares Versão 1.0
            <br>
            {{ date('l, d \d\e F \d\e Y \à\s H:i', strtotime('-3 hours')) }} 
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>