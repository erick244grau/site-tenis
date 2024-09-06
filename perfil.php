<?php
session_start(); // Inicia a sessão
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Minha Loja</title>
    <link rel="stylesheet" href="styles2.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Adicione o CSS para o formulário de perfil */
        .perfil {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            margin-top: 20px;
        }

        .perfil h2 {
            color: #f0f0f0;
            margin-bottom: 20px;
            font-size: 2.5em;
            font-weight: bold;
        }

        .perfil form {
            display: flex;
            flex-direction: column;
        }

        .perfil label {
            color: #c1c1c1;
            margin-bottom: 10px;
        }

        .perfil input[type="text"],
        .perfil input[type="email"],
        .perfil input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #333;
            border-radius: 5px;
            color: #e0e0e0;
            background: #2b2b2b;
        }

        .perfil input[type="submit"] {
            padding: 10px;
            background: #f39c12;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background 0.3s ease;
        }

        .perfil input[type="submit"]:hover {
            background: #e67e22;
        }

        .perfil .message {
            margin: 20px 0;
            font-size: 1.2em;
        }

        .perfil .message.success {
            color: #5cb85c;
        }

        .perfil .message.error {
            color: #d9534f;
        }

        .delete-account {
            margin-top: 20px;
            text-align: center;
        }

        .delete-account button {
            padding: 10px;
            background: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background 0.3s ease;
        }

        .delete-account button:hover {
            background: #c82333;
        }
    </style>

<style>
        /* Reset básico */
        body, h1, h2, h3, p, button, img {
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero {
            background: #fff;
            padding: 40px 0;
            text-align: center;
            margin-bottom: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hero-title {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .hero-subtitle {
            font-size: 1.2em;
            color: #555;
        }

        .produtos, .novos-tenis {
            margin-bottom: 40px;
        }

        .titulo-secao {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        .produtos-lista {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .produto {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .produto img {
            width: 100%;
            height: auto;
        }

        .descricao {
            padding: 15px;
        }

        .descricao h3 {
            margin-bottom: 10px;
        }

        .descricao p {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background: #4cae4c;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            position: relative;
        }

        .modal img {
            width: 100%;
            height: auto;
        }

        .fechar-modal {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5em;
            cursor: pointer;
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {
            .produtos-lista {
                flex-direction: column;
                align-items: center;
            }

            .produto {
                width: 90%;
                max-width: 400px;
            }

            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                align-items: center;
            }

            .nav-links.active {
                display: flex;
            }
        }
    </style>
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
