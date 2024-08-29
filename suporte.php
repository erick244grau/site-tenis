<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte - Minha Loja</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
<?php include_once 'includes/header.php'; ?> 

    <section class="suporte">
        <div class="container">
            <h2>Entre em Contato Conosco</h2>
            <form id="form-suporte">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
                
                <button type="submit" class="enviar-btn">Enviar</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
