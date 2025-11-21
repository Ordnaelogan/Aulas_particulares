<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aulas Particulares - Bem-vindo</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center">

    <div class="max-w-7xl mx-auto p-6 lg:p-8 w-full">
        <header class="flex justify-between items-center">
            
            {{-- Lado Esquerdo: Logo --}}
            <div class="flex items-center">
                {{-- O caminho da sua imagem é public/imagens/logo2.png --}}
                <img src="{{ asset('imagens/logo2.png') }}" alt="Logo Aulas Particulares" class="h-12 w-auto">
                <span class="ml-4 text-2xl font-bold text-gray-800 dark:text-gray-200">Aulas Particulares</span>
            </div>
            
            {{-- Lado Direito: Botão Acessar --}}
            <nav class="ml-auto">
                <a 
                    href="{{ route('login') }}" 
                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300"
                >
                    Acessar
                </a>
            </nav>

        </header>

        <main class="mt-16 text-center">
            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white">Gerencie Suas Aulas com Facilidade</h1>
            <p class="mt-4 text-xl text-gray-600 dark:text-gray-400">Tudo o que você precisa para controlar alunos e disciplinas em um só lugar.</p>
        </main>
    </div>

</body>
</html>