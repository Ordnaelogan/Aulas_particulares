{{-- resources/views/layouts/guest.blade.php - CÓDIGO FINAL COM FUNDO CUSTOMIZADO --}}

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Variáveis de Estilo Customizado (Seu Tema Dark Mode - Copiadas de original.blade.php) */
        :root {
            --bg-page: #1f2937; 
            --bg-card: #374151; /* Janela Central Escura */
            --text-light: #f3f4f6;
            --accent-primary: #f59e0b; /* AMARELO DOURADO */
            --shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            --accent-danger: #dc2626; 
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: var(--bg-page);
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
        
        /* Estiliza a caixa principal do formulário */
        .auth-card-box {
            background-color: var(--bg-card) !important;
            box-shadow: var(--shadow);
            border-radius: 12px !important;
            padding: 30px;
        }
        
        /* Estilo do Rodapé Fixo (Copiado de original.blade.php) */
        .app-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparente */
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
<body class="font-sans antialiased">
    <div class="custom-bg-image"></div> {{-- Adiciona a imagem de fundo --}}

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        
        <div class="auth-card-box w-full sm:max-w-md">
            {{ $slot }}
        </div>
    </div>
    
    <footer class="app-footer"> {{-- Adiciona o rodapé fixo --}}
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
</body>
</html>