<?php
session_start(); // Inicia a sessão
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Minha Loja</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">  
</head>
<body>
    <?php include_once 'includes/header.php'; ?>

    <section class="perfil">
        <div class="container">
            <?php
                include 'includes/conexao.php';

              
                
                if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
                    header('Location: login.php');
                    exit();
                }

                $email = $_SESSION['email'];

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['update'])) {
                        // Atualiza o perfil
                        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
                        $novoEmail = mysqli_real_escape_string($connect, $_POST['email']);
                        $novaSenha = mysqli_real_escape_string($connect, $_POST['senha']);
                        
                        if (!empty($novaSenha)) {
                            $senhaHash = password_hash($novaSenha, PASSWORD_BCRYPT);
                            $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE email = ?";
                            $stmt = mysqli_prepare($connect, $sql);
                            mysqli_stmt_bind_param($stmt, 'ssss', $nome, $novoEmail, $senhaHash, $email);
                        } else {
                            $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE email = ?";
                            $stmt = mysqli_prepare($connect, $sql);
                            mysqli_stmt_bind_param($stmt, 'sss', $nome, $novoEmail, $email);
                        }

                        if (mysqli_stmt_execute($stmt)) {
                            $_SESSION['email'] = $novoEmail; // Atualiza o email na sessão
                            echo "<p class='message success'>Perfil atualizado com sucesso!</p>";
                        } else {
                            echo "<p class='message error'>Erro ao atualizar o perfil: " . mysqli_error($connect) . "</p>";
                        }

                        mysqli_stmt_close($stmt);
                    }

                    if (isset($_POST['delete'])) {
                        // Deleta a conta
                        $sql = "DELETE FROM usuarios WHERE email = ?";
                        $stmt = mysqli_prepare($connect, $sql);
                        mysqli_stmt_bind_param($stmt, 's', $email);

                        if (mysqli_stmt_execute($stmt)) {
                            session_destroy();
                            header('Location: index.php');
                            exit();
                        } else {
                            echo "<p class='message error'>Erro ao excluir a conta: " . mysqli_error($connect) . "</p>";
                        }

                        mysqli_stmt_close($stmt);
                    }
                }

                // Obtém as informações atuais do usuário
                $sql = "SELECT nome, email FROM usuarios WHERE email = ?";
                $stmt = mysqli_prepare($connect, $sql);
                mysqli_stmt_bind_param($stmt, 's', $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $nome, $email);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
            ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <h2>Meu Perfil</h2>
            <form action="" method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                
                <label for="senha">Nova Senha (deixe em branco para não alterar):</label>
                <input type="password" id="senha" name="senha">
                
                <input type="submit" name="update" value="Atualizar Perfil">
            </form>

            <div class="delete-account">
                <p>Se você deseja excluir sua conta, clique no botão abaixo. Esta ação é irreversível.</p>
                <form action="" method="post">
                    <button type="submit" name="delete">Excluir Conta</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
