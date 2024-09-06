<?php
session_start(); // Inicia a sessão
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre - Minha Loja</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #e0e0e0;
            background-color: #121212;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, footer {
            background: #1f1f1f;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .sobre {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            margin-top: 20px;
            transition: transform 0.3s ease-in-out, background 0.3s ease-in-out;
        }

        .sobre:hover {
            transform: scale(1.02);
            background: #2a2a2a;
        }

        h2 {
            color: #f39c12;
            margin-bottom: 20px;
            font-size: 2.5em;
            font-weight: 700;
            text-align: center;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.1em;
            line-height: 1.8;
            color: #c1c1c1;
            text-align: center;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        footer {
            margin-top: auto;
            font-size: 0.9em;
            color: #aaa;
            text-align: center;
        }

        footer p {
            margin: 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .sobre {
                padding: 20px;
            }

            h2 {
                font-size: 2em;
            }

            p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <?php include_once 'includes/header.php'; ?>

    <section class="sobre">
        <div class="container">
            <h2>Sobre Nós</h2>
            <p>Somos uma loja online comprometida em oferecer produtos de alta qualidade e um excelente serviço aos nossos clientes.</p>
            <p>Nosso objetivo é proporcionar uma experiência de compra segura e conveniente, com uma ampla seleção de produtos das melhores marcas.</p>
            <p>Estamos constantemente inovando e buscando maneiras de melhorar para atender às necessidades e expectativas de nossos clientes.</p>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
