<?php
session_start(); // Inicie a sessão
include 'includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = mysqli_real_escape_string($connect, trim($_POST['email']));
    $senha = mysqli_real_escape_string($connect, $_POST['senha']);

    $sql = "SELECT senha FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

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
    <link rel="stylesheet" href="suporte.css">
</head>
<body>
<?php include_once 'includes/header.php'; ?> 

<section class="login-container">
    <h2>Login</h2>

    <form action="login.php" method="post" id="form-suporte" class="form-login"> 
        <input style="width: 50%;" class="btn-login" type="email" id="email" name="email" placeholder="Seu e-mail" required>
        
        <input style="width: 50%; margin-left:25%" type="password" id="senha" name="senha" placeholder="Senha" required>                
        <button style="width: 50%; margin-left:25%" type="submit" name="login" class="enviar-btn">Login</button>
    </form>
</section>

<footer class="footer">
    <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
</footer>
</body>
</html>
