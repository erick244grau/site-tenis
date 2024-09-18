<?php
// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos Gerais */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color:#1a1a1a;
            color: #fff;
        }

        /* Navbar */
        .navbar {
            background-color: #111;
            color: #fff;
            padding: 10px 15px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            border-bottom: 1px solid #222;
            transition: background-color 0.3s ease;
        }

        .navbar .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .logo a {
            color: #fff;
            text-decoration: none;
            font-size: 1.5em;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
            padding: 8px 15px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #888;
        }

        /* Botões de ação */
        .btn-login, .btn-register, .btn-logout {
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 0.9rem;
            border: 1px solid transparent;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-login, .btn-register, .btn-logout {
            background-color: #222;
            color: #fff;
        }

        .btn-login:hover, .btn-register:hover, .btn-logout:hover {
            background-color: #333;
        }

        /* Menu de Hambúrguer */
        .menu-toggle {
            display: none;
            flex-direction: column;
            background: none;
            border: none;
            cursor: pointer;
        }

        .menu-toggle .bar {
            background-color: #fff;
            height: 2px;
            width: 20px;
            margin: 4px 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        /* Animação do ícone de hambúrguer */
        .menu-toggle.active .bar:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }

        .menu-toggle.active .bar:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active .bar:nth-child(3) {
            transform: translateY(-6px) rotate(-45deg);
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                position: absolute;
                top: 50px;
                left: 0;
                background-color: #111;
                padding: 10px 0;
                border-top: 1px solid #222;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links a {
                padding: 12px;
                width: 100%;
                text-align: center;
            }

            .menu-toggle {
                display: flex;
            }
        }

        /* Efeito de transição suave ao rolar a página */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container">
            <h1 class="logo">
                <a href="index.php">Minha Loja</a>
            </h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="suporte.php">Suporte</a></li>
                    <li><a href="carrinho.php">Carrinho</a></li>

                    <?php if ($isLoggedIn): ?>
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="logout.php" class="btn-logout">Sair</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="btn-login">Login</a></li>
                        <li><a href="cadastro_usuario.php" class="btn-register">Cadastre-se</a></li>
                    <?php endif; ?>
                </ul>
                <!-- Menu de hambúrguer para dispositivos móveis -->
                <button class="menu-toggle" aria-label="Abrir menu de navegação">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </nav>
        </div>
    </header>

    <!-- Adicione o JavaScript para a funcionalidade do menu de hambúrguer -->
    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
            this.classList.toggle('active');
        });
    </script>
</body>
</html>
