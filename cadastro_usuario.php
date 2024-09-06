<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Minha Loja</title>
    <link rel="stylesheet" href="css/styles3.css">
    <style>
        /* Reset básico */
        body, h2, p, form, label, input {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
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

        .suporte {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            max-width: 600px;
            margin: 30px auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .suporte:hover {
            transform: scale(1.02);
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2em;
            font-weight: 700;
            text-align: center;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #666;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #5cb85c;
            outline: none;
        }

        input[type="submit"] {
            padding: 12px;
            background: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background: #4cae4c;
            transform: scale(1.02);
        }

        footer {
            margin-top: 40px;
            font-size: 0.9em;
            color: #aaa;
        }

        footer p {
            margin: 0;
        }

        @media (max-width: 768px) {
            .suporte {
                padding: 20px;
            }

            h2 {
                font-size: 1.6em;
            }

            input[type="submit"] {
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <?php include_once 'includes/header.php'; ?>

    <section class="suporte">
        <?php
        include 'includes/conexao.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
            // Captura e sanitiza os dados do formulário
            $nome = mysqli_real_escape_string($connect, trim($_POST['nome']));
            $email = mysqli_real_escape_string($connect, trim($_POST['email']));
            $senha = mysqli_real_escape_string($connect, $_POST['senha']);
            
            // Hash da senha
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

            // Verifica se o email já está cadastrado
            $sql = "SELECT id FROM usuarios WHERE email = ?";
            $stmt = mysqli_prepare($connect, $sql);
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 0) {
                // Insere os dados na tabela
                $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($connect, $sql);
                mysqli_stmt_bind_param($stmt, 'sss', $nome, $email, $senhaHash);
                
                if (mysqli_stmt_execute($stmt)) {
                    echo "<p style='color: #5cb85c;'>Cadastro realizado com sucesso!</p>";
                } else {
                    echo "<p style='color: #d9534f;'>Erro ao cadastrar: " . mysqli_error($connect) . "</p>";
                }
            } else {
                echo "<p style='color: #d9534f;'>O email já está cadastrado.</p>";
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
