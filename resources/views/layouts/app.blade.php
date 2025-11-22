<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Classe customizada para usar a imagem de fundo do seu projeto */
            .custom-bg-image {
                background-image: url("{{ asset('imagens/2025.png') }}");
                background-size: cover;
                background-position: center;
                filter: blur(5px); /* Aplicando o desfoque que você mencionou */
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: -1; /* Coloca o fundo atrás de todo o conteúdo */
            }
            /* Garante que o conteúdo fique visível sobre o fundo */
            main {
                position: relative;
                z-index: 1;
                /* Max-width e centralização são definidas nas views que usam este layout */
            }
        </style>
    </head>
    <body class="font-sans antialiased text-white">
        <div class="custom-bg-image"></div> 
        
        <div class="min-h-screen">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-purple-900 dark:bg-purple-900 shadow-none bg-opacity-70">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>