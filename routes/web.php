<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Aulas Particulares | Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --bg-base: #1f2937; /* Fundo mais escuro para o ambiente */
            --accent-primary: #f59e0b; /* AMARELO DOURADO */
            --text-light: #f3f4f6;
            --shadow-strong: 0 10px 30px rgba(0, 0, 0, 0.7);
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            min-height: 100vh;
            color: var(--text-light);
            position: relative; /* Para o overlay e background funcionarem */
            overflow: hidden; /* Garante que o blur não crie barras de rolagem */
        }

        /* 1. Imagem de Fundo (Temática e Desfocada) */
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://picsum.photos/1920/1080?query=teacher,classroom,students'); /* Exemplo: professor, sala de aula */
            background-size: cover;
            background-position: center;
            filter: blur(4px) brightness(0.6); /* Mais desfoque e mais escuro */
            z-index: -1; /* Fica atrás de todo o conteúdo */
            transform: scale(1.02); /* Evita bordas brancas do blur */
        }

        /* Overlay escuro para garantir contraste */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* Escurece ainda mais a imagem */
            z-index: 0;
        }

        /* Conteúdo Principal (não afetado pelo blur do body) */
        .main-content {
            position: relative; /* Fica acima do background */
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-grow: 1; /* Para ocupar o espaço vertical disponível */
            padding: 20px;
        }

        /* 2. Caixa Central Transparente (Definida e Transparente) */
        .content-box {
            background-color: rgba(30, 40, 50, 0.85); /* Fundo escuro com 85% de opacidade */
            backdrop-filter: blur(10px); /* Efeito de vidro borrado por trás da caixa */
            -webkit-backdrop-filter: blur(10px); /* Compatibilidade Safari */
            padding: 50px;
            border-radius: 15px;
            box-shadow: var(--shadow-strong);
            text-align: center;
            width: 90%;
            max-width: 800px; /* Um pouco mais largo */
            border: 1px solid rgba(245, 158, 11, 0.3); /* Borda sutil dourada */
        }

        h1 {
            font-size: 2.8rem; /* Título maior */
            color: var(--accent-primary);
            margin-bottom: 15px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
        }

        p {
            font-size: 1.2rem;
            color: #d1d5db; /* Texto um pouco mais claro */
            margin-bottom: 50px;
            line-height: 1.6;
        }

        .nav-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px; /* Maior espaçamento */
            width: 100%;
        }
        
        /* Botões Estilizados (Definidos e com Cor Primária) */
        .nav-btn {
            background-color: var(--accent-primary); /* Dourado Sólido */
            color: var(--bg-base); /* Texto bem escuro para alto contraste */
            padding: 25px 15px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem; /* Texto um pouco maior */
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .nav-btn:hover {
            background-color: #e6910b; /* Levemente mais escuro no hover */
            transform: translateY(-7px); /* Efeito de "levante" mais pronunciado */
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.6);
        }

        .nav-btn i {
            font-size: 3rem; /* Ícones maiores */
            margin-bottom: 15px;
            color: var(--bg-base);
        }

        /* 3. Rodapé para Logo (Definido, Semi-Transparente, Fixo) */
        .footer-logo {
            width: 100%;
            padding: 25px 0;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.6); /* Fundo semi-transparente */
            color: #9ca3af;
            font-size: 1rem;
            position: sticky; /* ou fixed, dependendo do scroll */
            bottom: 0;
            left: 0;
            z-index: 10;
            border-top: 1px solid rgba(245, 158, 11, 0.2); /* Linha sutil dourada */
        }
        .footer-logo .logo-text {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .footer-logo i {
            font-size: 1.5rem;
            color: var(--accent-primary);
        }

        /* Responsividade básica */
        @media (max-width: 768px) {
            .content-box {
                padding: 30px;
            }
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1rem;
            }
            .nav-grid {
                grid-template-columns: 1fr; /* Uma coluna em telas menores */
            }
        }
    </style>
</head>
<body>
    
    <div class="background-image"></div>
    <div class="overlay"></div>

    <div class="main-content">
        <div class="content-box">
            <h1>AULAS PARTICULARES PREMIUM</h1>
            <p>Gerencie seus alunos, disciplinas e agendamentos de forma inteligente e eficiente, com a tecnologia a seu favor.</p>

            <div class="nav-grid">
                <a href="{{ route('alunos.index') }}" class="nav-btn">
                    <i class="fas fa-user-graduate"></i>
                    ALUNOS
                </a>
                
                <a href="#" class="nav-btn">
                    <i class="fas fa-book"></i>
                    DISCIPLINAS
                </a>

                <a href="#" class="nav-btn">
                    <i class="fas fa-calendar-check"></i>
                    AULAS
                </a>
            </div>
        </div>
    </div>

    <footer class="footer-logo">
        <div class="logo-text">
            <i class="fas fa-chalkboard-teacher"></i> 
            <span>Software Aulas Particulares | Versão 1.0</span>
        </div>
    </footer>

</body>
</html>