{{-- resources/views/welcome.blade.php --}}

<x-guest-layout>
    
    <div style="text-align: center; max-width: 600px; margin: 0 auto; color: var(--text-light);">
        
        <div style="background-color: rgba(55, 65, 81, 0.8); padding: 40px; border-radius: 12px; box-shadow: var(--shadow);">
            
            <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 15px;">
                AULAS PARTICULARES PREMIUM
            </h1>
            
            <p style="font-size: 1.1rem; margin-bottom: 30px;">
                Gerencie seus alunos, disciplinas e agendamentos de forma inteligente e eficiente, com a tecnologia a seu favor.
            </p>
            
            {{-- Botão Principal de Acesso (Dourado/Amarelo) --}}
            <a 
                href="{{ route('login') }}" 
                style="background-color: var(--accent-primary); color: var(--bg-card); border: none; padding: 10px 40px; font-weight: bold; border-radius: 6px; text-decoration: none; display: inline-block; box-shadow: var(--shadow);"
                class="hover:opacity-90 transition duration-150 ease-in-out"
            >
                ACESSAR
            </a>
        </div>
        
    </div>
    
</x-guest-layout>