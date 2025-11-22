<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variáveis de Dark Mode */
        :root {
            --bg-page: #1f2937;
            --bg-card: #374151;
            --text-light: #f3f4f6;
            --accent-primary: #f59e0b; /* Dourado */
            --accent-secondary: #2dd4bf;
            --accent-danger: #dc2626;
            --shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
        }
        
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: var(--bg-page); 
            padding: 40px;
            color: var(--text-light);
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
        }
        .container-box { 
            max-width: 600px; 
            margin: auto;
            background: var(--bg-card); 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: var(--shadow); 
            margin-bottom: 100px;
        }
        
        /* Estilo para o cabeçalho com logo */
        .header-logo {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #4b5563;
        }
        .header-logo img { height: 40px; width: auto; }
        .header-logo h1 { margin: 0; padding: 0; border: none; font-size: 1.8rem; font-weight: 700; margin-left: 15px; }
        
        /* Formulário e Selects */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; font-size: 0.95rem; }
        .form-group input, 
        .form-group select { 
            width: 100%; padding: 10px; border: 1px solid #4b5563; border-radius: 6px; box-sizing: border-box;
            background-color: #4b5563; color: var(--text-light);
            -webkit-appearance: none; -moz-appearance: none; appearance: none;
        }
        .form-group select option { background-color: #4b5563; color: var(--text-light); }

        /* Botão de Atualizar */
        .btn-submit { 
            padding: 10px 20px; background-color: #007bff; /* Cor Azul (Edição) */
            color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;
            transition: opacity 0.2s;
        }
        .btn-submit:hover { opacity: 0.9; }

        /* Links */
        .link-back { 
            display: inline-block; margin-top: 20px; text-decoration: none; color: #9ca3af; font-weight: 600;
        }
        .link-back:hover { color: var(--accent-secondary); }

        /* Estilo para erros de validação */
        .alert-danger { 
            padding: 15px; background-color: var(--accent-danger); color: white; border-radius: 6px; margin-bottom: 20px; box-shadow: var(--shadow);
        }
        .alert-danger ul { margin: 0; padding-left: 20px; }

        /* Rodapé Acadêmico */
        .footer-academico {
            position: absolute; bottom: 0; left: 0; width: 100%; background-color: #27303d; color: #9ca3af; padding: 10px 0; font-size: 0.85rem; text-align: center; border-top: 1px solid #4b5563;
        }
        .footer-academico p { margin: 0; line-height: 1.4; }
        .footer-academico strong { color: var(--accent-secondary); }
        .footer-academico .laravel-logo, .footer-academico .csi-logo { height: 18px; vertical-align: middle; margin-left: 10px; }
        .footer-academico .laravel-logo { filter: invert(100%); }
    </style>
</head>
<body>
    <div class="container-box">
        
        <a href="{{ route('aulas.index') }}" class="link-back"><i class="fas fa-arrow-left me-2"></i> Voltar para a Lista de Aulas</a>

        <!-- Cabeçalho com LOGO DO PROJETO (logo2.png) -->
        <div class="header-logo">
            <img src="{{ asset('imagens/logo2.png') }}" alt="Logo Aulas Particulares">
            <h1>EDITAR AULA</h1>
        </div>

        <!-- Alertas de Validação -->
        @if ($errors->any())
            <div class="alert-danger">
                <strong>Opa!</strong> Algo deu errado:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário aponta para 'aulas.update' e usa o método 'PUT' -->
        <form action="{{ route('aulas.update', $aula->id) }}" method="POST">
            @csrf 
            @method('PUT')

            <div class="form-group">
                <label for="aluno_id">Aluno:</label>
                <select id="aluno_id" name="aluno_id" required>
                    <option value="">Selecione o Aluno</option>
                    @foreach ($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ old('aluno_id', $aula->aluno_id) == $aluno->id ? 'selected' : '' }}>
                            {{ $aluno->nome }} ({{ $aluno->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="disciplina_id">Disciplina:</label>
                <select id="disciplina_id" name="disciplina_id" required>
                    <option value="">Selecione a Disciplina</option>
                    @foreach ($disciplinas as $disciplina)
                        <option value="{{ $disciplina->id }}" {{ old('disciplina_id', $aula->disciplina_id) == $disciplina->id ? 'selected' : '' }}>
                            {{ $disciplina->nome }} (R$ {{ number_format($disciplina->valor_hora, 2, ',', '.') }}/h)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data da Aula:</label>
                <!-- Converte a data para o formato YYYY-MM-DD para preencher o input type="date" -->
                <input type="date" id="data" name="data" value="{{ old('data', \Carbon\Carbon::parse($aula->data)->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="duracao_horas">Duração (Horas, Ex: 1.5 para 1h30m):</label>
                <!-- Preenche a duração atual -->
                <input type="number" step="0.5" id="duracao_horas" name="duracao_horas" value="{{ old('duracao_horas', $aula->duracao_horas) }}" required min="0.5">
            </div>

            <p style="color: #9ca3af; font-size: 0.9em; margin-top: 20px;">
                * O valor total é recalculado. Valor atual: R$ {{ number_format($aula->valor_total, 2, ',', '.') }}
            </p>

            <button type="submit" class="btn-submit"><i class="fas fa-save me-2"></i> ATUALIZAR AULA</button>
        </form>
    </div>

    <!-- Rodapé Acadêmico -->
    <footer class="footer-academico">
        <p>Desenvolvido por: <strong>Leandro Vasconcelos</strong> e <strong>Cristina Amaral</strong></p>
        <p>Disciplina: Programação Orientada á Objeto | Profª: Luciene Soares</p>
        <p>Curso Técnico de Informática | Colégio Santo Inácio | Rede Jesuíta de Educação
            <img src="{{ asset('imagens/csi.png') }}" alt="Colégio Santo Inácio" class="csi-logo">
        </p>
        <p>Projeto Acadêmico | Sistema de Aulas Particulares | MVC Laravel 
            <img src="{{ asset('imagens/laravel.png') }}" alt="Laravel Framework" class="laravel-logo">
        </p>
    </footer>
</body>
</html>