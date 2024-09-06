<?php
session_start(); // Inicia a sessão
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte - Minha Loja</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: #e0e0e0;
            background-color: #121212;
            padding: 20px;
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

        .suporte {
            background: #2b2b2b;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            margin-top: 20px;
        }

        h2 {
            color: #f39c12;
            margin-bottom: 20px;
            font-size: 2.5em;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.1em;
            color: #d3d3d3;
            margin-bottom: 8px;
        }

        input, textarea {
            padding: 12px;
            font-size: 1em;
            margin-bottom: 20px;
            border: 1px solid #333;
            border-radius: 6px;
            background-color: #1a1a1a;
            color: #e0e0e0;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
        }

        input:focus, textarea:focus {
            outline: none;
            border: 1px solid #f39c12;
            box-shadow: 0 0 8px rgba(243, 156, 18, 0.6);
        }

        .enviar-btn {
            padding: 12px;
            font-size: 1.1em;
            background-color: #f39c12;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            text-transform: uppercase;
        }

        .enviar-btn:hover {
            background-color: #e67e22;
        }

        footer {
            margin-top: auto;
            font-size: 0.9em;
            color: #aaa;
        }

        .footer a {
            color: #f39c12;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #fff;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .suporte {
                padding: 20px;
            }

            h2 {
                font-size: 2em;
            }

            input, textarea, .enviar-btn {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <?php include_once 'includes/header.php'; ?> 

    <section class="suporte">
        <div class="container">
            <h2>Entre em Contato Conosco</h2>
            <form id="form-suporte">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
                
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Seu e-mail" required>
                
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="6" placeholder="Sua mensagem" required></textarea>
                
                <button type="submit" class="enviar-btn">Enviar</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Minha Loja. Todos os direitos reservados. <a href="privacy.php">Política de Privacidade</a></p>
        </div>
    </footer>
</body>
</html>
