<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Minha Loja</title>
    <link rel="stylesheet" href="css/styles3.css">
</head>
<style>


/* Reset básico */
body, h2, p, form, label, input {
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

header {
    background: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

footer {
    background: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
    margin-top: 20px;
}

.suporte {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    max-width: 600px;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
}

input[type="submit"] {
    padding: 10px;
    background: #5cb85c;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background: #4cae4c;
}

 </style>
<body>
<?php include_once 'includes/header.php'; ?> 

    <section class="suporte">
        <?php
            include 'includes/conexao.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
                // Captura e sanitiza os dados do formulário
                $nome = mysqli_real_escape_string($connect, $_POST['nome']);
                $email = mysqli_real_escape_string($connect, $_POST['email']);
                $senha = mysqli_real_escape_string($connect, $_POST['senha']);
                
                // Hash da senha
                $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

                // Verifica se o email já está cadastrado
                $sql = "SELECT id FROM usuarios WHERE email = '$email'";
                $result = mysqli_query($connect, $sql);

                if (mysqli_num_rows($result) == 0) {
                    // Insere os dados na tabela
                    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";
                    
                    if (mysqli_query($connect, $sql)) {
                        echo "<p>Cadastro realizado com sucesso!</p>";
                    } else {
                        echo "<p>Erro ao cadastrar: " . mysqli_error($connect) . "</p>";
                    }
                } else {
                    echo "<p>O email já está cadastrado.</p>";
                }
            }
        ?>

        <h2>Cadastro de Usuário</h2>
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br>
            <input type="submit" name="cadastrar" value="Cadastrar">
        </form>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
