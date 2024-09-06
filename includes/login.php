<?php
session_start(); // Inicia a sessão

include 'includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Obtém e valida a entrada do usuário
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (empty($email) || empty($senha)) {
        echo "<p class='message error'>Por favor, preencha todos os campos!</p>";
    } else {
        // Prepara a consulta para evitar SQL Injection
        $sql = "SELECT senha FROM usuarios WHERE email = ?";
        $stmt = mysqli_prepare($connect, $sql);

        if ($stmt) {
            // Vincula o parâmetro e executa a consulta
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $hashedPassword);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            // Verifica a senha
            if (password_verify($senha, $hashedPassword)) {
                $_SESSION['loggedin'] = true; // Define a variável de sessão
                $_SESSION['email'] = $email; // Opcional: armazena o email do usuário
                header('Location: index.php');
                exit();
            } else {
                echo "<p class='message error'>Senha incorreta!</p>";
            }
        } else {
            echo "<p class='message error'>Erro na consulta ao banco de dados!</p>";
        }
    }
}

// Feche a conexão com o banco de dados
mysqli_close($connect);
?>
