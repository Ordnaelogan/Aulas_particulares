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
            --bg-page: #1f2937;
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
            
            /* Imagem de Fundo (Troque 'SUA_URL_DA_IMAGEM' pelo caminho real) */
            background-image: url('https://picsum.photos/1920/1080?grayscale');
            background-size: cover;
            background-position: center;
            
            /* Efeito de Desfoque */
            filter: blur(2px) brightness(0.7);
            transform: scale(1.02); /* Para evitar bordas brancas após o blur */
        }

        /* Container que desfaz o efeito de blur no conteúdo */
        .backdrop-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            filter: none;
            transform: none;
            z-index: 10;
        }

        /* CAIXA CENTRAL TRANSPARENTE */
        .content-box {
            background-color: rgba(30, 40, 50, 0.7); /* Fundo escuro com 70% de transparência */
            backdrop-filter: blur(8px); /* Blur no fundo do box (efeito de vidro) */
            padding: 50px;
            border-radius: 15px;
            box-shadow: var(--shadow-strong);
            text-align: center;
            width: 90%;
            max-width: 700px;
            margin-top: 10vh;
            margin-bottom: 50px;
        }

        h1 {
            font-size: 2.5rem;
            color: var(--accent-primary);
            margin-bottom: 10px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        p {
            font-size: 1.1rem;
            color: #ccc;
            margin-bottom: 40px;
        }

        .nav-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 100%;
        }
        
        /* Botões Estilizados */
        .nav-btn {
            background-color: rgba(245, 158, 11, 0.9); /* Dourado quase sólido */
            color: var(--bg-page);
            padding: 25px 15px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .nav-btn:hover {
            background-color: var(--accent-primary);
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        .nav-btn i {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: var(--bg-page);
        }

        /* Rodapé/Logo */
        .footer-logo {
            padding: 20px;
            width: 100%;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparente para ver a foto */
            font-size: 0.9rem;
            color: #9ca3af;
        }
    </style>
</head>
<body>
    
    <div class="backdrop-container">

        <div class="content-box">
            <h1>AULAS PARTICULARES PREMIUM</h1>
            <p>Gerencie seus alunos, disciplinas e agendamentos de forma inteligente e eficiente.</p>

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

        <footer class="footer-logo">
            <i class="fas fa-laptop-code" style="color: var(--accent-primary);"></i> Software Aulas Particulares | Versão 1.0
        </footer>

    </div>

</body>
</html>