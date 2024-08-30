<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre - Minha Loja</title>
    <link rel="stylesheet" href="styles2.css">
    <style>
        /* Reset básico */
        body, h2, p {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            padding: 20px;
        }

        header, footer {
            background: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .sobre {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2em;
            font-weight: bold;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.1em;
            line-height: 1.8;
        }

        footer {
            margin-top: 20px;
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
