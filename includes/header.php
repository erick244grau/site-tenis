<?php
// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
?>

<header class="navbar">
    <div class="container">
        <h1 class="logo"><a href="index.php">Minha Loja</a></h1>
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

<!-- Adicione o CSS para estilizar o cabeçalho -->
<style>
    /* Estilos Gerais */
    .navbar {
        background-color: #000; /* Cor de fundo do cabeçalho */
        color: #fff; /* Cor do texto */
        padding: 10px 20px;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 1000;
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
    }

    .nav-links li {
        position: relative;
    }

    .nav-links a {
        color: #fff;
        text-decoration: none;
        padding: 10px 15px;
        transition: background-color 0.3s, color 0.3s;
    }

    .nav-links a:hover {
        background-color: #333;
        color: #fff;
    }

    .btn-login, .btn-register, .btn-logout {
        padding: 8px 12px;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .btn-login {
        background-color: #007bff;
        color: #fff;
    }

    .btn-register {
        background-color: #28a745;
        color: #fff;
    }

    .btn-logout {
        background-color: #dc3545;
        color: #fff;
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
        height: 3px;
        width: 25px;
        margin: 4px 0;
        transition: 0.3s;
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .nav-links {
            display: none;
            flex-direction: column;
            width: 100%;
            position: absolute;
            top: 60px;
            left: 0;
            background-color: #000;
        }

        .nav-links.active {
            display: flex;
        }

        .menu-toggle {
            display: flex;
        }
    }
</style>

<!-- Adicione o JavaScript para a funcionalidade do menu de hambúrguer -->
<script>
    document.querySelector('.menu-toggle').addEventListener('click', function() {
        document.querySelector('.nav-links').classList.toggle('active');
    });
</script>
