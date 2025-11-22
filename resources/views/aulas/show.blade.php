<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Aula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variáveis de Dark Mode */
        :root {
            --bg-page: #1f2937;
            --bg-card: #374151;
            --text-light: #f3f4f6;
            --accent-primary: #f59e0b; /* Dourado */
            --accent-secondary: #2dd4bf; /* Ciano/Mint */
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

        /* Estilo dos Detalhes */
        .detail-group { 
            margin-bottom: 15px; 
            border-left: 4px solid var(--accent-secondary); /* Destaque Secundário (Ciano) */
            padding-left: 15px;
            background-color: #4b556350; 
            padding: 10px;
            border-radius: 4px;
        }
        .detail-group strong { display: block; color: var(--accent-primary); font-size: 0.9em; text-transform: uppercase; margin-bottom: 3px; }
        .detail-group span { font-size: 1.1em; color: var(--text-light); }
        
        /* Links */
        .link-back { 
            display: inline-block; margin-top: 20px; text-decoration: none; color: #9ca3af; font-weight: 600;
            padding: 8px 12px; border: 1px solid #9ca3af; border-radius: 4px;
        }
        .link-back:hover { color: var(--accent-secondary); border-color: var(--accent-secondary); }

        /* Rodapé Acadêmico */
        .footer-academico {
            position: absolute; bottom: 0; left: 0; width: 100%; background-color: #27303d; color: #9ca3af; padding: 10px 0; font-size: 0.85rem; text-align: center; border-top: 1px solid #4b5563;
        }
        .footer-academico p { margin: 0; line-height: 1.4; }
        .footer-academico strong { color: var(--accent-secondary); }
        .footer-academico .laravel-logo, .footer-academico .csi-logo { height: 18px; vertical-align: middle; margin-left: 10px; }
        .footer-academico .laravel-logo { filter: invert(100%); }
    </style>
    <script>
        // Funções de formatação
        function formatarMoeda(valor) {
            return parseFloat(valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }
        function formatarData(data) {
            const dateObj = new Date(data);
            const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            return dateObj.toLocaleDateString('pt-BR', options);
        }
    </script>
</head>
<body>
    <div class="container-box">
        
        <a href="{{ route('aulas.index') }}" class="link-back"><i class="fas fa-arrow-left me-2"></i> Voltar para a Lista de Aulas</a>

        <!-- Cabeçalho com LOGO DO PROJETO (logo2.png) -->
        <div class="header-logo">
            <img src="{{ asset('imagens/logo2.png') }}" alt="Logo Aulas Particulares">
            <h1>DETALHES DA AULA</h1>
        </div>

        <div class="detail-group">
            <strong>Aluno:</strong>
            <span>{{ $aula->aluno->nome }} ({{ $aula->aluno->email }})</span>
        </div>

        <div class="detail-group">
            <strong>Disciplina:</strong>
            <span>{{ $aula->disciplina->nome }}</span>
        </div>

        <div class="detail-group">
            <strong>Data da Aula:</strong>
            <span id="data-aula">{{ $aula->data }}</span>
        </div>
        
        <div class="detail-group">
            <strong>Duração:</strong>
            <span>{{ $aula->duracao_horas }} horas</span>
        </div>

        <div class="detail-group">
            <strong>Valor por Hora da Disciplina:</strong>
            <span id="valor-hora">{{ $aula->disciplina->valor_hora }}</span>
        </div>
        
        <div class="detail-group">
            <strong>Valor Total da Aula:</strong>
            <span id="valor-total">{{ $aula->valor_total }}</span>
        </div>

        <hr style="border: 0; border-top: 1px solid #4b5563; margin: 30px 0;">

        <div class="detail-group">
            <strong>ID da Aula:</strong>
            <span>{{ $aula->id }}</span>
        </div>
        <div class="detail-group">
            <strong>Criada em:</strong>
            <span>{{ $aula->created_at->format('d/m/Y \à\s H:i') }}</span>
        </div>

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
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formatar = (id) => {
                const element = document.getElementById(id);
                if (element) {
                    element.textContent = formatarMoeda(element.textContent);
                }
            };
            formatar('valor-hora');
            formatar('valor-total');
            
            const dataElement = document.getElementById('data-aula');
            if (dataElement) {
                dataElement.textContent = formatarData(dataElement.textContent);
            }
        });
    </script>
</body>
</html>