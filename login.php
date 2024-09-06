<?php
session_start(); // Inicie a sessão
include 'includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $senha = mysqli_real_escape_string($connect, $_POST['senha']);

    $sql = "SELECT senha FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email; 
            echo "<p class='message success'>Login realizado com sucesso! Redirecionando...</p>";
            header('Location: index.php');
            exit(); // Certifique-se de adicionar exit() após header()
        } else {
            echo "<p class='message error'>Senha incorreta!</p>";
        }
    } else {
        echo "<p class='message error'>Email não encontrado!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Minha Loja</title>
    <link rel="stylesheet" href="css/styles3.css">
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
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        footer {
            background: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
        }

        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            max-width: 400px;
            margin: 40px auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 12px;
            background: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #4cae4c;
        }

        .message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            font-size: 1em;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
<?php include_once 'includes/header.php'; ?> 

    <section class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <input type="submit" name="login" value="Login">
        </form>
    </section>

    <footer class="footer">
        <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
