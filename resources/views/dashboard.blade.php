<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center text-white">
            <h2 class="font-semibold text-xl leading-tight">
                Dashboard Geral
            </h2>
            {{-- Botão Adicionar Novo --}}
            <a href="#" class="px-4 py-2 bg-yellow-500 text-purple-900 font-bold rounded-lg shadow-md hover:bg-yellow-400 transition duration-300">
                + Novo Registro
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Contêiner Principal: Fundo Roxo com Transparência --}}
            <div class="bg-purple-900 bg-opacity-70 p-8 shadow-xl sm:rounded-xl">
                <h3 class="text-2xl font-bold mb-6 text-white">Visão Geral dos Registros</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- Card Alunos (Estilo Dourado/Amarelo) --}}
                    <div class="flex flex-col p-6 bg-yellow-500 rounded-xl shadow-lg text-purple-900 justify-between">
                        <div>
                            <p class="text-sm opacity-90">Total de</p>
                            <h4 class="text-4xl font-extrabold mt-1">{{ 0 }} Alunos</h4>
                        </div>
                        <div class="mt-4 space-y-2">
                            <a href="{{ route('alunos.index') }}" class="block px-3 py-1 bg-purple-900 text-white hover:bg-purple-800 rounded-md text-sm text-center">
                                Gerenciar Alunos
                            </a>
                        </div>
                    </div>
                    
                    {{-- Card Disciplinas (Estilo Dourado/Amarelo) --}}
                    <div class="flex flex-col p-6 bg-yellow-500 rounded-xl shadow-lg text-purple-900 justify-between">
                        <div>
                            <p class="text-sm opacity-90">Total de</p>
                            <h4 class="text-4xl font-extrabold mt-1">{{ 0 }} Disciplinas</h4>
                        </div>
                        <div class="mt-4 space-y-2">
                            <a href="{{ route('disciplinas.index') }}" class="block px-3 py-1 bg-purple-900 text-white hover:bg-purple-800 rounded-md text-sm text-center">
                                Gerenciar Disciplinas
                            </a>
                        </div>
                    </div>

                    {{-- Card Aulas (Estilo Dourado/Amarelo) --}}
                    <div class="flex flex-col p-6 bg-yellow-500 rounded-xl shadow-lg text-purple-900 justify-between">
                        <div>
                            <p class="text-sm opacity-90">Total de</p>
                            <h4 class="text-4xl font-extrabold mt-1">{{ 0 }} Aulas</h4>
                        </div>
                        <div class="mt-4 space-y-2">
                            <a href="{{ route('aulas.index') }}" class="block px-3 py-1 bg-purple-900 text-white hover:bg-purple-800 rounded-md text-sm text-center">
                                Gerenciar Aulas
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>