{{-- resources/views/dashboard.blade.php --}}

@extends('layouts.original')

@section('title', 'Dashboard Geral')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h1 style="color: var(--text-light); font-size: 1.8rem; margin-bottom: 0;">VISÃO GERAL DO SISTEMA</h1>
        <a href="{{ route('alunos.create') }}" class="btn-action btn-create"><i class="fas fa-plus me-2"></i> NOVO REGISTRO</a>
    </div>

    {{-- Cards do Dashboard com o estilo DOURADO/AMARELO do seu tema --}}
    <div class="row row-cols-1 row-cols-md-3 g-4">
        
        {{-- Card Alunos --}}
        <div class="col">
            <div class="card-dashboard p-4" style="background-color: var(--accent-primary) !important;">
                <div class="card-body p-0">
                    <p class="text-sm opacity-90" style="color: var(--bg-card);">Total de</p>
                    <h4 class="h4 font-weight-bold mt-1" style="color: var(--bg-card);">0 Alunos</h4>
                    <a href="{{ route('alunos.index') }}" class="mt-3 btn btn-sm btn-dark w-100" style="background-color: var(--bg-card); color: var(--accent-primary); border: none;">Gerenciar</a>
                </div>
            </div>
        </div>
        
        {{-- Card Disciplinas --}}
        <div class="col">
            <div class="card-dashboard p-4" style="background-color: var(--accent-primary) !important;">
                <div class="card-body p-0">
                    <p class="text-sm opacity-90" style="color: var(--bg-card);">Total de</p>
                    <h4 class="h4 font-weight-bold mt-1" style="color: var(--bg-card);">0 Disciplinas</h4>
                    <a href="{{ route('disciplinas.index') }}" class="mt-3 btn btn-sm btn-dark w-100" style="background-color: var(--bg-card); color: var(--accent-primary); border: none;">Gerenciar</a>
                </div>
            </div>
        </div>

        {{-- Card Aulas --}}
        <div class="col">
            <div class="card-dashboard p-4" style="background-color: var(--accent-primary) !important;">
                <div class="card-body p-0">
                    <p class="text-sm opacity-90" style="color: var(--bg-card);">Total de</p>
                    <h4 class="h4 font-weight-bold mt-1" style="color: var(--bg-card);">0 Aulas</h4>
                    <a href="{{ route('aulas.index') }}" class="mt-3 btn btn-sm btn-dark w-100" style="background-color: var(--bg-card); color: var(--accent-primary); border: none;">Gerenciar</a>
                </div>
            </div>
        </div>
    </div>

@endsection