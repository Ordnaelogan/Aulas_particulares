{{-- resources/views/dashboard.blade.php --}}

@extends('layouts.original')

@section('title', 'Dashboard Geral')

@section('content')

    {{-- O Layout (original.blade.php) agora aplica a transparência na caixa principal (container-box) --}}

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h1 style="color: var(--text-light); font-size: 1.8rem; margin-bottom: 0;">AULAS PARTICULARES PREMIUM</h1>
        
        {{-- BOTÃO REMOVIDO: A função do Dashboard é ACESSAR MÓDULOS, não registrar --}}
    </div>

    <p style="color: var(--text-light); margin-bottom: 40px; font-size: 1.1rem;">
        Gerencie seus alunos, disciplinas e agendamentos de forma inteligente e eficiente, com a tecnologia a seu favor.
    </p>

    {{-- Cards de Acesso com estilo DOURADO/AMARELO e ícones --}}
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        
        {{-- Card Alunos --}}
        <div class="col-md-4">
            <div class="card-dashboard p-4 text-center" style="background-color: var(--accent-primary) !important;">
                <a href="{{ route('alunos.index') }}" style="text-decoration: none;">
                    <i class="fas fa-user-graduate fa-3x" style="color: var(--bg-card);"></i>
                    <p class="mt-3 font-weight-bold" style="color: var(--bg-card); font-size: 1.1rem; margin-bottom: 0;">ALUNOS</p>
                </a>
            </div>
        </div>
        
        {{-- Card Disciplinas --}}
        <div class="col-md-4">
            <div class="card-dashboard p-4 text-center" style="background-color: var(--accent-primary) !important;">
                <a href="{{ route('disciplinas.index') }}" style="text-decoration: none;">
                    <i class="fas fa-book fa-3x" style="color: var(--bg-card);"></i>
                    <p class="mt-3 font-weight-bold" style="color: var(--bg-card); font-size: 1.1rem; margin-bottom: 0;">DISCIPLINAS</p>
                </a>
            </div>
        </div>

        {{-- Card Aulas --}}
        <div class="col-md-4">
            <div class="card-dashboard p-4 text-center" style="background-color: var(--accent-primary) !important;">
                <a href="{{ route('aulas.index') }}" style="text-decoration: none;">
                    <i class="fas fa-calendar-alt fa-3x" style="color: var(--bg-card);"></i>
                    <p class="mt-3 font-weight-bold" style="color: var(--bg-card); font-size: 1.1rem; margin-bottom: 0;">AULAS</p>
                </a>
            </div>
        </div>
    </div>

@endsection