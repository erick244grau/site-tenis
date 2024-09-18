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
    <link rel="stylesheet" href="suporte.css">
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
